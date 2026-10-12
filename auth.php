<?php
declare(strict_types=1);

require_once __DIR__ . "/includes/bootstrap.php";
require_once __DIR__ . "/includes/smtp_mailer.php";

header("Content-Type: application/json; charset=utf-8");
header("Cache-Control: no-store");

function auth_response(int $status, bool $success, string $message, array $extra = []): void
{
    http_response_code($status);
    echo json_encode(
        ["success" => $success, "message" => $message] + $extra,
        JSON_UNESCAPED_SLASHES
    );
    exit;
}

function required_text(string $key, int $maxLength): string
{
    $value = trim((string) ($_POST[$key] ?? ""));
    if ($value === "" || mb_strlen($value) > $maxLength) {
        auth_response(422, false, "Please check the required information and try again.");
    }

    return $value;
}

function normalized_email(): string
{
    $email = strtolower(trim((string) ($_POST["email"] ?? "")));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 254) {
        auth_response(422, false, "Enter a valid email address.");
    }

    return $email;
}

function issue_otp(PDO $pdo, string $email, string $purpose, ?array $pendingData): void
{
    $select = $pdo->prepare(
        "SELECT last_sent_at FROM otp_challenges WHERE email = ? AND purpose = ?"
    );
    $select->execute([$email, $purpose]);
    $existing = $select->fetch();
    if ($existing) {
        $lastSent = strtotime($existing["last_sent_at"] . " UTC");
        if ($lastSent !== false && time() - $lastSent < 60) {
            auth_response(429, false, "Please wait a minute before requesting another code.");
        }
    }

    $otp = (string) random_int(100000, 999999);
    $hash = password_hash($otp, PASSWORD_DEFAULT);
    $pendingJson = $pendingData === null
        ? null
        : json_encode($pendingData, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
    $upsert = $pdo->prepare(
        "INSERT INTO otp_challenges
            (email, purpose, otp_hash, pending_data, expires_at, last_sent_at, attempts)
         VALUES (?, ?, ?, ?, DATE_ADD(UTC_TIMESTAMP(), INTERVAL 10 MINUTE), UTC_TIMESTAMP(), 0)
         ON DUPLICATE KEY UPDATE
            otp_hash = VALUES(otp_hash),
            pending_data = VALUES(pending_data),
            expires_at = VALUES(expires_at),
            last_sent_at = VALUES(last_sent_at),
            attempts = 0"
    );
    $upsert->execute([$email, $purpose, $hash, $pendingJson]);

    try {
        send_otp_email(auth_config(), $email, $otp);
    } catch (RuntimeException $exception) {
        $delete = $pdo->prepare("DELETE FROM otp_challenges WHERE email = ? AND purpose = ?");
        $delete->execute([$email, $purpose]);
        error_log("[ARTCLUB auth] OTP email delivery failed: " . $exception->getMessage());
        auth_response(503, false, "We could not send the email code. Please check the email settings and try again.");
    }
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    auth_response(405, false, "Use a form submission to make this request.");
}
if (!hash_equals(auth_csrf_token(), (string) ($_POST["csrf_token"] ?? ""))) {
    auth_response(403, false, "Your session expired. Refresh the page and try again.");
}

try {
    $action = (string) ($_POST["action"] ?? "");
    $pdo = auth_database();

if ($action === "start_signup") {
    $email = normalized_email();
    $interest = (string) ($_POST["interest"] ?? "");
    $allowedInterests = [
        "visual-art", "photography", "design", "exhibitions",
        "collaboration", "exploring",
    ];
    if (!in_array($interest, $allowedInterests, true)) {
        auth_response(422, false, "Choose an area of interest.");
    }
    $pending = [
        "name" => required_text("name", 120),
        "email" => $email,
        "department" => required_text("department", 120),
        "part" => required_text("part", 50),
        "interest" => $interest,
        "message" => trim((string) ($_POST["message"] ?? "")),
    ];
    if (mb_strlen($pending["message"]) > 2000) {
        auth_response(422, false, "Your message must be 2,000 characters or fewer.");
    }

    $exists = $pdo->prepare("SELECT id FROM members WHERE email = ?");
    $exists->execute([$email]);
    if ($exists->fetch()) {
        auth_response(409, false, "That email is already registered. Please sign in instead.");
    }

    issue_otp($pdo, $email, "signup", $pending);
    auth_response(200, true, "We sent a 6-digit verification code to your email.");
}

if ($action === "start_login" || $action === "resend_login") {
    $email = normalized_email();
    $memberQuery = $pdo->prepare("SELECT id FROM members WHERE email = ?");
    $memberQuery->execute([$email]);
    if ($memberQuery->fetch()) {
        issue_otp($pdo, $email, "login", null);
    }
    auth_response(200, true, "If that email belongs to a member, a sign-in code has been sent.");
}

if ($action === "resend_signup") {
    $email = normalized_email();
    $existing = $pdo->prepare(
        "SELECT pending_data FROM otp_challenges WHERE email = ? AND purpose = 'signup'"
    );
    $existing->execute([$email]);
    $challenge = $existing->fetch();
    if (!$challenge || !$challenge["pending_data"]) {
        auth_response(400, false, "Start your membership application again to request a code.");
    }
    $pending = json_decode($challenge["pending_data"], true, 512, JSON_THROW_ON_ERROR);
    issue_otp($pdo, $email, "signup", $pending);
    auth_response(200, true, "A new verification code has been sent.");
}

if ($action === "verify_signup" || $action === "verify_login") {
    $email = normalized_email();
    $purpose = $action === "verify_signup" ? "signup" : "login";
    $otp = trim((string) ($_POST["otp"] ?? ""));
    if (!preg_match("/^[0-9]{6}$/", $otp)) {
        auth_response(422, false, "Enter the 6-digit code from your email.");
    }
    $challengeQuery = $pdo->prepare(
        "SELECT otp_hash, pending_data, attempts, (expires_at <= UTC_TIMESTAMP()) AS expired
         FROM otp_challenges WHERE email = ? AND purpose = ?"
    );
    $challengeQuery->execute([$email, $purpose]);
    $challenge = $challengeQuery->fetch();
    if (!$challenge || (int) $challenge["expired"] === 1 || (int) $challenge["attempts"] >= 5) {
        $delete = $pdo->prepare("DELETE FROM otp_challenges WHERE email = ? AND purpose = ?");
        $delete->execute([$email, $purpose]);
        auth_response(400, false, "That code is invalid or expired. Request a new one.");
    }
    if (!password_verify($otp, $challenge["otp_hash"])) {
        $attempt = $pdo->prepare(
            "UPDATE otp_challenges SET attempts = attempts + 1 WHERE email = ? AND purpose = ?"
        );
        $attempt->execute([$email, $purpose]);
        auth_response(400, false, "That code is incorrect. Please check it and try again.");
    }

    if ($purpose === "signup") {
        $pending = json_decode($challenge["pending_data"], true, 512, JSON_THROW_ON_ERROR);
        $pdo->beginTransaction();
        try {
            $insert = $pdo->prepare(
                "INSERT INTO members
                    (name, email, department, part, interest, message, verified_at)
                 VALUES (?, ?, ?, ?, ?, ?, UTC_TIMESTAMP())"
            );
            $insert->execute([
                $pending["name"],
                $email,
                $pending["department"],
                $pending["part"],
                $pending["interest"],
                $pending["message"],
            ]);
            $memberId = (int) $pdo->lastInsertId();
            $delete = $pdo->prepare("DELETE FROM otp_challenges WHERE email = ? AND purpose = ?");
            $delete->execute([$email, $purpose]);
            $pdo->commit();
        } catch (PDOException $exception) {
            $pdo->rollBack();
            if ((string) $exception->getCode() === "23000") {
                auth_response(409, false, "That email is already registered. Please sign in.");
            }
            throw $exception;
        }
    } else {
        $memberQuery = $pdo->prepare("SELECT id FROM members WHERE email = ?");
        $memberQuery->execute([$email]);
        $member = $memberQuery->fetch();
        if (!$member) {
            auth_response(400, false, "That code is invalid or expired. Request a new one.");
        }
        $memberId = (int) $member["id"];
        $delete = $pdo->prepare("DELETE FROM otp_challenges WHERE email = ? AND purpose = ?");
        $delete->execute([$email, $purpose]);
    }

    session_regenerate_id(true);
    $_SESSION["member_id"] = $memberId;
    $_SESSION["auth_csrf_token"] = bin2hex(random_bytes(32));
    auth_response(200, true, "Your email is verified. Welcome to ARTCLUB.", [
        "redirect" => "member.php",
    ]);
}

auth_response(400, false, "Unknown authentication request.");
} catch (PDOException $exception) {
    error_log("[ARTCLUB auth] Database request failed: " . $exception->getMessage());
    auth_response(503, false, "Member services are temporarily unavailable. Please try again later.");
} catch (RuntimeException $exception) {
    error_log("[ARTCLUB auth] " . $exception->getMessage());
    auth_response(503, false, "Member services are not configured yet. Please follow AUTH_SETUP.md.");
} catch (JsonException $exception) {
    error_log("[ARTCLUB auth] Could not parse pending signup data.");
    auth_response(500, false, "Member services could not process that request. Please try again.");
}

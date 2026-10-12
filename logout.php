<?php
declare(strict_types=1);

require_once __DIR__ . "/includes/bootstrap.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST"
    || !hash_equals(auth_csrf_token(), (string) ($_POST["csrf_token"] ?? ""))) {
    http_response_code(403);
    exit("Invalid sign-out request. Return to the member page and try again.");
}

$_SESSION = [];
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), "", [
        "expires" => time() - 42000,
        "path" => $params["path"],
        "domain" => $params["domain"],
        "secure" => $params["secure"],
        "httponly" => $params["httponly"],
        "samesite" => $params["samesite"] ?? "Lax",
    ]);
}
session_destroy();
header("Location: login.php");
exit;

<?php
declare(strict_types=1);

function smtp_expect($socket, array $expectedCodes): string
{
    $response = "";
    do {
        $line = fgets($socket, 515);
        if ($line === false) {
            throw new RuntimeException("The SMTP server closed the connection unexpectedly.");
        }
        $response .= $line;
    } while (isset($line[3]) && $line[3] === "-");

    $code = (int) substr($line, 0, 3);
    if (!in_array($code, $expectedCodes, true)) {
        throw new RuntimeException("The SMTP server returned an unexpected response.");
    }

    return $response;
}

function smtp_command($socket, string $command, array $expectedCodes): string
{
    $payload = $command . "\r\n";
    $offset = 0;
    while ($offset < strlen($payload)) {
        $written = fwrite($socket, substr($payload, $offset));
        if ($written === false || $written === 0) {
            throw new RuntimeException("Could not write to the SMTP server.");
        }
        $offset += $written;
    }

    return smtp_expect($socket, $expectedCodes);
}

function send_otp_email(array $config, string $recipient, string $otp): void
{
    $smtp = $config["smtp"] ?? [];
    foreach (["host", "port", "encryption", "username", "password", "from_email", "from_name"] as $key) {
        if (!isset($smtp[$key]) || $smtp[$key] === "") {
            throw new RuntimeException("SMTP configuration is incomplete.");
        }
    }
    if (!filter_var($smtp["from_email"], FILTER_VALIDATE_EMAIL)
        || !filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
        throw new RuntimeException("The sender or recipient email address is invalid.");
    }
    if (!in_array($smtp["encryption"], ["tls", "ssl"], true)) {
        throw new RuntimeException("SMTP encryption must be tls or ssl.");
    }

    $host = (string) $smtp["host"];
    $port = (int) $smtp["port"];
    $transport = $smtp["encryption"] === "ssl" ? "ssl://" : "tcp://";
    $context = stream_context_create([
        "ssl" => [
            "verify_peer" => true,
            "verify_peer_name" => true,
            "peer_name" => $host,
        ],
    ]);
    $socket = @stream_socket_client(
        $transport . $host . ":" . $port,
        $errorCode,
        $errorMessage,
        15,
        STREAM_CLIENT_CONNECT,
        $context
    );
    if ($socket === false) {
        throw new RuntimeException("Could not connect to the configured SMTP server.");
    }
    stream_set_timeout($socket, 15);

    try {
        smtp_expect($socket, [220]);
        $serverName = preg_replace("/[^A-Za-z0-9.-]/", "", (string) ($_SERVER["SERVER_NAME"] ?? "localhost"));
        smtp_command($socket, "EHLO " . ($serverName ?: "localhost"), [250]);

        if ($smtp["encryption"] === "tls") {
            smtp_command($socket, "STARTTLS", [220]);
            if (stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT) !== true) {
                throw new RuntimeException("Could not establish encrypted SMTP transport.");
            }
            smtp_command($socket, "EHLO " . ($serverName ?: "localhost"), [250]);
        }

        smtp_command($socket, "AUTH LOGIN", [334]);
        smtp_command($socket, base64_encode((string) $smtp["username"]), [334]);
        smtp_command($socket, base64_encode((string) $smtp["password"]), [235]);
        smtp_command($socket, "MAIL FROM:<" . $smtp["from_email"] . ">", [250]);
        smtp_command($socket, "RCPT TO:<" . $recipient . ">", [250, 251]);
        smtp_command($socket, "DATA", [354]);

        $subject = "Your ARTCLUB verification code";
        $fromName = "=?UTF-8?B?" . base64_encode((string) $smtp["from_name"]) . "?=";
        $body = "Your ARTCLUB verification code is: " . $otp . "\r\n\r\n"
            . "This code expires in 10 minutes and can only be used once. "
            . "If you did not request it, you can ignore this email.";
        $message = "From: " . $fromName . " <" . $smtp["from_email"] . ">\r\n"
            . "To: <" . $recipient . ">\r\n"
            . "Subject: =?UTF-8?B?" . base64_encode($subject) . "?=\r\n"
            . "MIME-Version: 1.0\r\n"
            . "Content-Type: text/plain; charset=UTF-8\r\n"
            . "Content-Transfer-Encoding: base64\r\n"
            . "\r\n"
            . chunk_split(base64_encode($body), 76, "\r\n");
        $message = preg_replace("/^\./m", "..", $message);
        $payload = rtrim($message, "\r\n") . "\r\n.\r\n";
        $offset = 0;
        while ($offset < strlen($payload)) {
            $written = fwrite($socket, substr($payload, $offset));
            if ($written === false || $written === 0) {
                throw new RuntimeException("Could not send the email through SMTP.");
            }
            $offset += $written;
        }
        smtp_expect($socket, [250]);
        smtp_command($socket, "QUIT", [221]);
    } finally {
        fclose($socket);
    }
}

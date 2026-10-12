<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    ini_set("session.use_strict_mode", "1");
    session_set_cookie_params([
        "httponly" => true,
        "secure" => !empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off",
        "samesite" => "Lax",
        "path" => "/",
    ]);
    session_start();
}

function auth_csrf_token(): string
{
    if (!isset($_SESSION["auth_csrf_token"])) {
        $_SESSION["auth_csrf_token"] = bin2hex(random_bytes(32));
    }

    return $_SESSION["auth_csrf_token"];
}

function auth_config(): array
{
    static $config;

    if ($config === null) {
        $configPath = __DIR__ . "/config.local.php";
        if (!is_file($configPath)) {
            throw new RuntimeException(
                "Missing includes/config.local.php. Follow AUTH_SETUP.md to configure the database and SMTP."
            );
        }
        $config = require $configPath;
        if (!is_array($config)) {
            throw new RuntimeException("The local application configuration is invalid.");
        }
    }

    return $config;
}

function auth_database(): PDO
{
    static $pdo;

    if ($pdo === null) {
        $database = auth_config()["database"] ?? [];
        foreach (["host", "name", "username", "password"] as $key) {
            if (!array_key_exists($key, $database)) {
                throw new RuntimeException("Database configuration is incomplete.");
            }
        }

        $dsn = sprintf(
            "mysql:host=%s;dbname=%s;charset=utf8mb4",
            $database["host"],
            $database["name"]
        );
        $pdo = new PDO($dsn, $database["username"], $database["password"], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        $pdo->exec("SET time_zone = '+00:00'");
    }

    return $pdo;
}

function auth_escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

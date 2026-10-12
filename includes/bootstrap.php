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
        $config = is_file($configPath)
            ? require $configPath
            : auth_config_from_environment();
        if (!is_array($config)) {
            throw new RuntimeException("The application configuration is invalid.");
        }
    }

    return $config;
}

function auth_config_from_environment(): array
{
    $required = [
        "DB_HOST",
        "DB_NAME",
        "DB_USERNAME",
        "DB_PASSWORD",
        "SMTP_HOST",
        "SMTP_PORT",
        "SMTP_ENCRYPTION",
        "SMTP_USERNAME",
        "SMTP_PASSWORD",
        "SMTP_FROM_EMAIL",
        "SMTP_FROM_NAME",
    ];
    $values = [];
    foreach ($required as $key) {
        $value = getenv($key);
        if ($value === false || $value === "") {
            throw new RuntimeException("Missing required environment variable: " . $key);
        }
        $values[$key] = $value;
    }

    $smtpPort = filter_var($values["SMTP_PORT"], FILTER_VALIDATE_INT);
    if ($smtpPort === false || $smtpPort < 1 || $smtpPort > 65535) {
        throw new RuntimeException("SMTP_PORT must be a valid TCP port.");
    }

    $databasePortValue = getenv("DB_PORT");
    $databasePort = $databasePortValue === false || $databasePortValue === ""
        ? 3306
        : filter_var($databasePortValue, FILTER_VALIDATE_INT);
    if ($databasePort === false || $databasePort < 1 || $databasePort > 65535) {
        throw new RuntimeException("DB_PORT must be a valid TCP port.");
    }

    return [
        "database" => [
            "host" => $values["DB_HOST"],
            "port" => $databasePort,
            "name" => $values["DB_NAME"],
            "username" => $values["DB_USERNAME"],
            "password" => $values["DB_PASSWORD"],
            "ssl_ca" => getenv("DB_SSL_CA") ?: "",
        ],
        "smtp" => [
            "host" => $values["SMTP_HOST"],
            "port" => $smtpPort,
            "encryption" => $values["SMTP_ENCRYPTION"],
            "username" => $values["SMTP_USERNAME"],
            "password" => $values["SMTP_PASSWORD"],
            "from_email" => $values["SMTP_FROM_EMAIL"],
            "from_name" => $values["SMTP_FROM_NAME"],
        ],
    ];
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
            "mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4",
            $database["host"],
            $database["port"] ?? 3306,
            $database["name"]
        );
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        if (!empty($database["ssl_ca"])) {
            $options[PDO::MYSQL_ATTR_SSL_CA] = $database["ssl_ca"];
        }
        $pdo = new PDO($dsn, $database["username"], $database["password"], $options);
        $pdo->exec("SET time_zone = '+00:00'");
    }

    return $pdo;
}

function auth_escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

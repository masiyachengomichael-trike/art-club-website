CREATE TABLE IF NOT EXISTS members (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(254) NOT NULL,
    department VARCHAR(120) NOT NULL,
    part VARCHAR(50) NOT NULL,
    interest VARCHAR(40) NOT NULL,
    message TEXT NOT NULL,
    verified_at DATETIME NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_members_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS otp_challenges (
    email VARCHAR(254) NOT NULL,
    purpose VARCHAR(16) NOT NULL,
    otp_hash VARCHAR(255) NOT NULL,
    pending_data JSON NULL,
    expires_at DATETIME NOT NULL,
    last_sent_at DATETIME NOT NULL,
    attempts TINYINT UNSIGNED NOT NULL DEFAULT 0,
    PRIMARY KEY (email, purpose),
    KEY ix_otp_expires_at (expires_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

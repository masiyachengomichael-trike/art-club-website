<?php
require_once __DIR__ . "/includes/bootstrap.php";
$pageTitle = "Member Login | ARTCLUB";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sign in to ARTCLUB with an email verification code.">
    <meta name="csrf-token" content="<?= htmlspecialchars(auth_csrf_token(), ENT_QUOTES, "UTF-8") ?>">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8") ?></title>
    <link rel="stylesheet" href="assets/css/style.css?v=20261011-brand">
    <script src="assets/js/script.js?v=20261011-back" defer></script>
</head>
<body class="login-page">

<header class="navbar">
    <a href="index.php" class="logo" aria-label="ARTCLUB home">
        <img src="assets/images/logo/Gemini_Generated_Image_ql3rzwql3rzwql3r.jpeg"
             alt="ARTCLUB logo">
    </a>

    <button class="menu-toggle" id="menuToggle" type="button"
            aria-label="Toggle navigation" aria-expanded="false"
            aria-controls="navLinks">
        ☰
    </button>

    <nav id="navLinks" aria-label="Main navigation">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="activities.php">Activities</a>
        <a href="gallery.php">Gallery</a>
        <a href="exhibition.php">Exhibition</a>
        <a href="join.php" class="active" aria-current="page">Join Us</a>
        <a href="index.php#contact" class="contact-nav-link">Contact Us</a>
    </nav>

    <button class="theme-toggle" id="themeToggle" type="button"
            aria-label="Switch to dark mode" title="Switch to dark mode">
        <svg class="theme-icon-moon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
            <path d="M20.2 15.4A8.5 8.5 0 0 1 8.6 3.8 8.5 8.5 0 1 0 20.2 15.4Z"/>
        </svg>
        <svg class="theme-icon-sun" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
            <circle cx="12" cy="12" r="4"/>
            <path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/>
        </svg>
    </button>
</header>

<main class="login-main">
    <section class="login-panel" aria-labelledby="login-heading">
        <div class="login-panel-copy">
            <p class="join-section-label">ARTCLUB · MEMBER SPACE</p>
            <h1 id="login-heading">Welcome<br>back.</h1>
            <p class="login-intro">
                Sign in to reconnect with the ARTCLUB community and continue
                exploring your creative practice.
            </p>
            <div class="login-notice" role="note">
                <strong>Email verification</strong>
                <p>
                    We’ll email you a one-time code to securely sign in. No
                    password is needed.
                </p>
            </div>
        </div>

        <form class="login-form" id="loginForm">
            <input type="hidden" name="csrf_token"
                   value="<?= htmlspecialchars(auth_csrf_token(), ENT_QUOTES, "UTF-8") ?>">
            <label for="loginEmail">Email address</label>
            <input id="loginEmail" name="email" type="email"
                   autocomplete="email" placeholder="you@example.com" required>

            <div class="login-otp-step" id="loginOtpStep" hidden>
                <label for="loginOtp">Email verification code</label>
                <input id="loginOtp" name="otp" type="text" inputmode="numeric"
                       autocomplete="one-time-code" pattern="[0-9]{6}" maxlength="6"
                       placeholder="6-digit code" disabled>
                <button class="otp-resend" id="loginResendOtp" type="button">
                    Resend code
                </button>
                <button class="otp-resend" id="loginChangeEmail" type="button">
                    Use a different email
                </button>
            </div>

            <button class="login-submit" type="submit">
                <span class="login-submit-label" id="loginSubmitLabel">Email me a sign-in code</span>
                <span class="login-submit-arrow" aria-hidden="true">↗</span>
            </button>
            <p class="login-feedback" id="loginFeedback"
               role="status" aria-live="polite"></p>

            <p class="login-form-note">
                Not a member yet?
                <a href="join.php">Register your interest</a>
            </p>
        </form>
    </section>
</main>

<footer class="footer join-footer">
    <a href="index.php" class="logo footer-brand-logo" aria-label="ARTCLUB home">
        <img src="assets/images/logo/Gemini_Generated_Image_ql3rzwql3rzwql3r.jpeg"
             alt="">
        <span class="footer-brand-name"><span>ART</span><span>CLUB</span></span>
    </a>
    <nav aria-label="Footer navigation">
        <a href="about.php">About</a>
        <a href="activities.php">Activities</a>
        <a href="gallery.php">Gallery</a>
        <a href="exhibition.php">Exhibition</a>
        <a href="join.php">Join Us</a>
    </nav>
    <p>&copy; <?= date("Y") ?> ARTCLUB. All rights reserved.</p>
</footer>

</body>
</html>

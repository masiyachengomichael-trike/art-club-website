<?php
declare(strict_types=1);

require_once __DIR__ . "/includes/bootstrap.php";

$memberId = (int) ($_SESSION["member_id"] ?? 0);
if ($memberId < 1) {
    header("Location: login.php");
    exit;
}

$query = auth_database()->prepare(
    "SELECT name, email, department, part, interest, message, verified_at
     FROM members WHERE id = ?"
);
$query->execute([$memberId]);
$member = $query->fetch();
if (!$member) {
    $_SESSION = [];
    session_destroy();
    header("Location: login.php");
    exit;
}

$pageTitle = "Member Space | ARTCLUB";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your ARTCLUB member space.">
    <title><?= auth_escape($pageTitle) ?></title>
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
            aria-controls="navLinks">☰</button>
    <nav id="navLinks" aria-label="Main navigation">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="activities.php">Activities</a>
        <a href="gallery.php">Gallery</a>
        <a href="exhibition.php">Exhibition</a>
        <a href="join.php">Join Us</a>
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
    <section class="login-panel" aria-labelledby="member-heading">
        <div class="login-panel-copy">
            <p class="join-section-label">ARTCLUB · MEMBER SPACE</p>
            <h1 id="member-heading">Welcome<br><?= auth_escape($member["name"]) ?>.</h1>
            <p class="login-intro">Your email is verified and your ARTCLUB membership is active.</p>
        </div>
        <div class="member-details">
            <p><strong>Email</strong><br><?= auth_escape($member["email"]) ?></p>
            <p><strong>Department</strong><br><?= auth_escape($member["department"]) ?></p>
            <p><strong>Part</strong><br><?= auth_escape($member["part"]) ?></p>
            <form action="logout.php" method="post">
                <input type="hidden" name="csrf_token"
                       value="<?= auth_escape(auth_csrf_token()) ?>">
                <button class="login-submit" type="submit">
                    Sign out <span class="login-submit-arrow" aria-hidden="true">↗</span>
                </button>
            </form>
        </div>
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

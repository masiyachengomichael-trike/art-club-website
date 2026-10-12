<?php
require_once __DIR__ . "/includes/bootstrap.php";
$pageTitle = "Become a Member | ARTCLUB";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore ARTCLUB and register your interest in becoming a member.">
    <meta name="csrf-token" content="<?= htmlspecialchars(auth_csrf_token(), ENT_QUOTES, "UTF-8") ?>">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8") ?></title>
    <link rel="stylesheet" href="assets/css/style.css?v=20261011-brand">
    <script src="assets/js/script.js?v=20261011-back" defer></script>
</head>
<body class="join-page">

<header class="navbar">
    <a href="index.php" class="logo" aria-label="ARTCLUB home">
        <img src="assets/images/logo/Gemini_Generated_Image_ql3rzwql3rzwql3r.jpeg"
             alt="ARTCLUB logo">
    </a>

    <button class="menu-toggle" id="menuToggle"
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

<main>
    <section class="join-hero">
        <div class="join-hero-copy">
            <p class="join-kicker">ARTCLUB · OPEN TO EVERY PERSPECTIVE</p>
            <h1>Make space<br>for your ideas.</h1>
            <p class="join-hero-intro">
                Find your people, explore your creativity, and help shape a
                community where ideas can take form.
            </p>
            <a class="join-scroll-link" href="#application">
                Register your interest <span aria-hidden="true">↓</span>
            </a>
        </div>
        <figure class="join-hero-image">
            <img src="assets/images/hero/slide2.jpg"
                 alt="ARTCLUB members gathered together outdoors">
            <figcaption>ARTCLUB · A COMMUNITY MADE BY ITS MEMBERS</figcaption>
        </figure>
        <span class="join-hero-index" aria-hidden="true">01 / 03</span>
    </section>

    <section class="join-introduction">
        <p class="join-section-label">WHY ARTCLUB</p>
        <div>
            <h2>Bring curiosity.<br>Leave room to create.</h2>
            <p>
                ARTCLUB brings students together around visual art, photography,
                design, exhibitions, and collaborative projects. Whether you
                already make work or are ready to try something new, there is
                room to explore and contribute.
            </p>
        </div>
    </section>

    <section class="join-application" id="application">
        <div class="join-form-intro">
            <p class="join-section-label">YOUR NEXT CHAPTER</p>
            <h2>Start with<br>a hello.</h2>
            <p>
                Tell us a little about yourself and what you would like to
                explore with ARTCLUB.
            </p>
            <p class="join-login-prompt">Already a member?</p>
            <a class="join-login-link" href="login.php">
                <span>Log in</span><span class="join-login-arrow" aria-hidden="true">↗</span>
            </a>
            <p class="join-form-note">
                Verify your email to complete your membership registration.
            </p>
        </div>

        <form class="join-form" id="membershipForm">
            <input type="hidden" name="csrf_token"
                   value="<?= htmlspecialchars(auth_csrf_token(), ENT_QUOTES, "UTF-8") ?>">
            <input type="hidden" name="email" id="joinVerificationEmail" disabled>
            <div id="joinApplicationFields" class="join-application-fields">
            <div class="join-form-row">
                <label>
                    <span>Your name <i aria-hidden="true">*</i></span>
                    <input type="text" name="name" autocomplete="name"
                           placeholder="Name" required>
                </label>
                <label>
                    <span>Email address <i aria-hidden="true">*</i></span>
                    <input type="email" name="email" autocomplete="email"
                           placeholder="you@example.com" required>
                </label>
            </div>

            <p class="join-institution-label">HARARE INSTITUTE OF TECHNOLOGY</p>
            <div class="join-form-row">
                <label>
                    <span>Department <i aria-hidden="true">*</i></span>
                    <input type="text" name="department" autocomplete="organization-title"
                           placeholder="Your department" required>
                </label>
                <label>
                    <span>Part <i aria-hidden="true">*</i></span>
                    <input type="text" name="part"
                           placeholder="e.g. Part 1" required>
                </label>
            </div>

            <label>
                <span>What are you interested in?</span>
                <select name="interest" required>
                    <option value="" selected disabled>Select an area</option>
                    <option value="visual-art">Visual art</option>
                    <option value="photography">Photography</option>
                    <option value="design">Design</option>
                    <option value="exhibitions">Exhibitions</option>
                    <option value="collaboration">Collaborative projects</option>
                    <option value="exploring">I’m still exploring</option>
                </select>
            </label>

            <label>
                <span>A little about what you would like to do <em>Optional</em></span>
                <textarea name="message" rows="4"
                          placeholder="Share an idea, an interest, or anything you would like us to know."></textarea>
            </label>
            </div>

            <div class="join-otp-step" id="joinOtpStep" hidden>
                <label for="joinOtp">Email verification code</label>
                <input id="joinOtp" name="otp" type="text" inputmode="numeric"
                       autocomplete="one-time-code" pattern="[0-9]{6}" maxlength="6"
                       placeholder="6-digit code" disabled>
                <button class="otp-resend" id="joinResendOtp" type="button">
                    Resend code
                </button>
                <button class="otp-resend" id="joinChangeEmail" type="button">
                    Edit application
                </button>
            </div>

            <button class="join-submit" type="submit">
                <span id="joinSubmitLabel">Email me a verification code</span>
                <span aria-hidden="true">↗</span>
            </button>
            <p class="join-form-feedback" id="membershipFormFeedback"
               role="status" aria-live="polite"></p>
            <p class="join-privacy-note">
                Required fields are marked with an asterisk. Your application
                is saved after your email address has been verified.
            </p>
        </form>
    </section>

    <section class="join-closing">
        <p class="join-section-label">ARTCLUB · UNIVERSITY COMMUNITY</p>
        <h2>There’s room<br>for your point of view.</h2>
        <a href="index.php" class="join-back-link">Back to the homepage <span aria-hidden="true">↗</span></a>
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
        <a href="join.php" aria-current="page">Join Us</a>
    </nav>
    <p>&copy; <?= date("Y") ?> ARTCLUB. All rights reserved.</p>
</footer>

</body>
</html>

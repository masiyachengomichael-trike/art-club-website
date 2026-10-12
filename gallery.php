<?php
$pageTitle = "Gallery | ARTCLUB";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Photographs of the ARTCLUB community and its members.">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8") ?></title>
    <link rel="stylesheet" href="assets/css/style.css?v=20261011-brand">
    <script src="assets/js/script.js?v=20261011-back" defer></script>
</head>
<body class="gallery-page">

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
        <a href="gallery.php" class="active" aria-current="page">Gallery</a>
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

<main>
    <section class="gallery-intro">
        <p class="gallery-kicker">ARTCLUB · PHOTO ARCHIVE</p>
        <h1>In good company.</h1>
        <p>
            Moments with the people who make up ARTCLUB—a look at our community,
            together.
        </p>
    </section>

    <section class="gallery-moments" aria-labelledby="gallery-heading">
        <div class="gallery-heading">
            <div>
                <p class="gallery-section-label">FROM THE COMMUNITY</p>
                <h2 id="gallery-heading">People. Moments. ARTCLUB.</h2>
            </div>
            <a class="gallery-join-link" href="join.php">
                Find your place <span aria-hidden="true">↗</span>
            </a>
        </div>

        <div class="gallery-grid">
            <figure class="gallery-item gallery-item-large">
                <a class="gallery-image" href="assets/images/hero/slide1.jpg"
                   target="_blank" rel="noopener"
                   aria-label="Open full-size photo of ARTCLUB members together outdoors">
                    <img src="assets/images/hero/slide1.jpg"
                         alt="ARTCLUB members spending time together outdoors"
                         loading="lazy">
                    <span class="gallery-view" aria-hidden="true">OPEN IMAGE ↗</span>
                </a>
                <figcaption>ARTCLUB · MEMBERS TOGETHER</figcaption>
            </figure>

            <figure class="gallery-item gallery-item-offset">
                <a class="gallery-image" href="assets/images/hero/slide2.jpg"
                   target="_blank" rel="noopener"
                   aria-label="Open full-size photo of the ARTCLUB community">
                    <img src="assets/images/hero/slide2.jpg"
                         alt="ARTCLUB members gathered together outdoors"
                         loading="lazy">
                    <span class="gallery-view" aria-hidden="true">OPEN IMAGE ↗</span>
                </a>
                <figcaption>ARTCLUB · A SHARED MOMENT</figcaption>
            </figure>

            <figure class="gallery-item gallery-item-last">
                <a class="gallery-image" href="assets/images/hero/slide3.jpg"
                   target="_blank" rel="noopener"
                   aria-label="Open full-size photo of ARTCLUB members as a group">
                    <img src="assets/images/hero/slide3.jpg"
                         alt="ARTCLUB members together as a group"
                         loading="lazy">
                    <span class="gallery-view" aria-hidden="true">OPEN IMAGE ↗</span>
                </a>
                <figcaption>ARTCLUB · COMMUNITY IN FRAME</figcaption>
            </figure>
        </div>
    </section>

    <section class="gallery-cta">
        <p class="gallery-section-label">ARTCLUB · OPEN TO EVERY PERSPECTIVE</p>
        <h2>There’s room<br>for your point of view.</h2>
        <a href="join.php" class="gallery-cta-link">
            Become a member <span aria-hidden="true">↗</span>
        </a>
    </section>
</main>

<footer class="footer">
    <a href="index.php" class="logo footer-brand-logo" aria-label="ARTCLUB home">
        <img src="assets/images/logo/Gemini_Generated_Image_ql3rzwql3rzwql3r.jpeg"
             alt="">
        <span class="footer-brand-name"><span>ART</span><span>CLUB</span></span>
    </a>
    <nav aria-label="Footer navigation">
        <a href="about.php">About</a>
        <a href="activities.php">Activities</a>
        <a href="gallery.php" aria-current="page">Gallery</a>
        <a href="exhibition.php">Exhibition</a>
        <a href="join.php">Join Us</a>
    </nav>
    <p>&copy; <?= date("Y") ?> ARTCLUB. All rights reserved.</p>
</footer>

</body>
</html>

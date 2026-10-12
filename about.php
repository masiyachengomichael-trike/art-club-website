<?php
$pageTitle = "About | ARTCLUB";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover ARTCLUB’s story, values, creative vision, and community.">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8") ?></title>
    <link rel="stylesheet" href="assets/css/style.css?v=20261011-brand">
    <script src="assets/js/script.js?v=20261011-back" defer></script>
</head>
<body class="about-page">

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
        <a href="about.php" class="active" aria-current="page">About</a>
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

<main>
    <section class="about-hero">
        <div class="about-hero-image" role="img"
             aria-label="ARTCLUB members gathered together outdoors"></div>
        <div class="about-hero-copy about-reveal">
            <p class="about-kicker">GET TO KNOW ARTCLUB</p>
            <h1>We believe<br>creativity changes<br>everything.</h1>
            <p class="about-hero-description">
                ARTCLUB is a space for creative minds to explore ideas,
                develop their skills, share perspectives, and connect through art.
            </p>
            <div class="about-hero-actions">
                <a class="about-button about-button-light" href="#our-story">
                    Our story <span aria-hidden="true">↓</span>
                </a>
                <a class="about-text-link" href="join.php">
                    Become a member <span aria-hidden="true">↗</span>
                </a>
            </div>
        </div>
        <p class="about-hero-caption">ARTCLUB · DIFFERENT PERSPECTIVES, SHARED SPACE</p>
        <p class="about-hero-index" aria-hidden="true">01 / 03</p>
    </section>

    <section class="about-story about-section" id="our-story">
        <div class="about-story-heading about-reveal">
            <p class="about-section-label">01 / OUR STORY</p>
            <h2>Built around creativity.<br>United by expression.</h2>
        </div>
        <div class="about-story-copy about-reveal">
            <p>
                ARTCLUB brings together people who see the world differently
                and use creativity to express what words cannot always explain.
                Through artistic exploration, collaboration, and shared
                experiences, we create opportunities for members to learn,
                experiment, and showcase their work.
            </p>
            <span class="about-draft-note">EDITABLE DRAFT · REPLACE WITH THE CLUB’S OFFICIAL HISTORY</span>
        </div>
        <figure class="about-story-image about-reveal">
            <img src="assets/images/hero/slide1.jpg"
                 alt="ARTCLUB members spending time together outdoors"
                 loading="lazy">
            <figcaption>CREATIVITY GROWS THROUGH EXCHANGE.</figcaption>
        </figure>
    </section>

    <section class="about-purpose about-section">
        <div class="about-purpose-heading about-reveal">
            <p class="about-section-label">02 / OUR PURPOSE</p>
            <p class="about-proposed-note">PROPOSED STATEMENTS · EDITABLE</p>
        </div>
        <article class="about-purpose-item about-reveal">
            <span class="about-purpose-number">01</span>
            <div>
                <h2>Our mission</h2>
                <p>
                    To create an inclusive creative community where members can
                    explore artistic expression, develop their abilities,
                    collaborate, and share their work with others.
                </p>
            </div>
        </article>
        <article class="about-purpose-item about-reveal">
            <span class="about-purpose-number">02</span>
            <div>
                <h2>Our vision</h2>
                <p>
                    To build a vibrant artistic community that inspires original
                    thinking, celebrates diverse perspectives, and makes
                    creativity an important part of campus life.
                </p>
            </div>
        </article>
    </section>

    <section class="about-values about-section">
        <div class="about-values-heading about-reveal">
            <p class="about-section-label">03 / WHAT GUIDES US</p>
            <h2>Values in practice.</h2>
        </div>
        <div class="about-values-list">
            <article class="about-value about-reveal">
                <span>01</span>
                <h3>Creativity</h3>
                <p>Encouraging experimentation, originality, and fresh ideas.</p>
            </article>
            <article class="about-value about-reveal">
                <span>02</span>
                <h3>Community</h3>
                <p>Bringing people together through shared interests and collaboration.</p>
            </article>
            <article class="about-value about-reveal">
                <span>03</span>
                <h3>Expression</h3>
                <p>Giving members the confidence and space to communicate their perspectives through art.</p>
            </article>
            <article class="about-value about-reveal">
                <span>04</span>
                <h3>Growth</h3>
                <p>Creating opportunities to learn new techniques, build skills, and discover new possibilities.</p>
            </article>
        </div>
    </section>

    <section class="about-activities about-section">
        <div class="about-activities-heading about-reveal">
            <div>
                <p class="about-section-label">04 / WHAT WE DO</p>
                <h2>Many ways to make.</h2>
            </div>
            <a class="about-inline-link" href="activities.php">
                Explore activities <span aria-hidden="true">↗</span>
            </a>
        </div>
        <div class="about-activities-grid">
            <a class="about-activity about-activity-feature about-reveal"
               href="activities.php#activity-programme">
                <img src="assets/images/hero/slide3.jpg"
                     alt="ARTCLUB members together as a group" loading="lazy">
                <span class="about-activity-index">01 / LEARN</span>
                <span class="about-activity-copy">
                    <strong>Art workshops</strong>
                    <span>Explore techniques and creative approaches together.</span>
                </span>
                <span class="about-activity-arrow" aria-hidden="true">↗</span>
            </a>
            <a class="about-activity about-reveal" href="activities.php#activity-programme">
                <span class="about-activity-index">02 / MAKE</span>
                <span class="about-activity-copy">
                    <strong>Collaborative projects</strong>
                    <span>Bring different ideas together and explore what they can become.</span>
                </span>
                <span class="about-activity-arrow" aria-hidden="true">↗</span>
            </a>
            <a class="about-activity about-reveal" href="exhibition.php">
                <span class="about-activity-index">03 / SHARE</span>
                <span class="about-activity-copy">
                    <strong>Artwork exhibitions</strong>
                    <span>Create space to present original work and perspectives.</span>
                </span>
                <span class="about-activity-arrow" aria-hidden="true">↗</span>
            </a>
            <a class="about-activity about-reveal" href="activities.php">
                <span class="about-activity-index">04 / EXPERIMENT</span>
                <span class="about-activity-copy">
                    <strong>Creative competitions</strong>
                    <span>Opportunities to challenge yourself and try a new direction.</span>
                </span>
                <span class="about-activity-arrow" aria-hidden="true">↗</span>
            </a>
            <a class="about-activity about-reveal" href="activities.php">
                <span class="about-activity-index">05 / CONNECT</span>
                <span class="about-activity-copy">
                    <strong>Campus art events</strong>
                    <span>Ways to bring art and creative conversation into campus life.</span>
                </span>
                <span class="about-activity-arrow" aria-hidden="true">↗</span>
            </a>
            <a class="about-activity about-reveal" href="exhibition.php">
                <span class="about-activity-index">06 / DISCOVER</span>
                <span class="about-activity-copy">
                    <strong>Member showcases</strong>
                    <span>Celebrate the ideas and work of our creative community.</span>
                </span>
                <span class="about-activity-arrow" aria-hidden="true">↗</span>
            </a>
        </div>
    </section>

    <section class="about-community">
        <div class="about-community-copy about-reveal">
            <p class="about-section-label">05 / OUR COMMUNITY</p>
            <h2>Different perspectives.<br>One creative community.</h2>
            <p>
                Every member brings a different perspective, and together those
                perspectives make our creative community richer.
            </p>
        </div>
        <div class="about-community-images about-reveal">
            <img class="about-community-image-main"
                 src="assets/images/hero/slide2.jpg"
                 alt="A wide group of ARTCLUB members gathered outdoors"
                 loading="lazy">
            <img class="about-community-image-detail"
                 src="assets/images/hero/slide3.jpg"
                 alt="ARTCLUB members sharing a moment together"
                 loading="lazy">
            <p>CREATIVITY IS BETTER WHEN IT’S SHARED.</p>
        </div>
    </section>

    <section class="about-cta">
        <p class="about-section-label">YOUR PERSPECTIVE BELONGS HERE</p>
        <h2>Make space for<br>your creativity.</h2>
        <p>
            Whether you create, experiment, or simply appreciate art, there is
            a place for you in our community.
        </p>
        <a class="about-button about-button-dark" href="join.php">
            Join ARTCLUB <span aria-hidden="true">↗</span>
        </a>
    </section>
</main>

<footer class="footer">
    <a href="index.php" class="logo footer-brand-logo" aria-label="ARTCLUB home">
        <img src="assets/images/logo/Gemini_Generated_Image_ql3rzwql3rzwql3r.jpeg"
             alt="">
        <span class="footer-brand-name"><span>ART</span><span>CLUB</span></span>
    </a>
    <p>Made by creatives, for creatives.</p>
    <p>&copy; <?= date("Y") ?> Art Club. All rights reserved.</p>
</footer>

</body>
</html>

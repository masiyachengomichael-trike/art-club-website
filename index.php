
<?php
$pageTitle = "Art Club | Creativity Without Limits";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="assets/css/style.css?v=20261011-brand">
    <script src="assets/js/script.js?v=20261011-back" defer></script>
</head>
<body class="home-page">

<header class="navbar">
    <a href="index.php" class="logo" aria-label="ARTCLUB home">
        <img src="assets/images/logo/Gemini_Generated_Image_ql3rzwql3rzwql3r.jpeg"
             alt="ARTCLUB logo">
    </a>

    <button class="menu-toggle" id="menuToggle"
            aria-label="Toggle navigation" aria-expanded="false">
        ☰
    </button>

    <nav id="navLinks">
        <a href="index.php" class="active">Home</a>
        <a href="about.php">About</a>
        <a href="activities.php">Activities</a>
        <a href="gallery.php">Gallery</a>
        <a href="exhibition.php">Exhibition</a>
        <a href="join.php">Join Us</a>
        <a href="#contact" class="contact-nav-link">Contact Us</a>
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
    
<section class="hero hero-slideshow">

    <!-- Background slideshow -->
    <div class="hero-slides" aria-hidden="true">
        <div class="hero-slide active"
             style="background-image: url('assets/images/hero/slide1.jpg')"></div>

        <div class="hero-slide"
             style="background-image: url('assets/images/hero/slide2.jpg')"></div>

        <div class="hero-slide"
             style="background-image: url('assets/images/hero/slide3.jpg')"></div>
    </div>

    <!-- Dark overlay keeps text readable -->
    <div class="hero-overlay"></div>

    <div class="hero-copy">
        <p class="eyebrow">IMAGINE | CREATE | INSPIRE</p>

        <h1>
            Art is how we<br>
            make sense of<br>
            <span>the world.</span>
        </h1>

        <p class="hero-description">
            A creative community for students who want to explore art,
            share ideas and bring original work to life.
        </p>

        <div class="hero-actions">
            <a href="join.php" class="button button-dark">
                Become a Member <span>↗</span>
            </a>

            <a href="gallery.php" class="text-link">
                Explore our gallery →
            </a>
        </div>
    </div>

    <!-- Slideshow controls -->
    <div class="hero-controls">
        <button id="prevSlide" aria-label="Previous image">←</button>

        <div class="slide-indicators">
            <button class="slide-dot active" data-slide="0"
                    aria-label="Show image 1"></button>
            <button class="slide-dot" data-slide="1"
                    aria-label="Show image 2"></button>
            <button class="slide-dot" data-slide="2"
                    aria-label="Show image 3"></button>
        </div>

        <button id="nextSlide" aria-label="Next image">→</button>
    </div>

    <div class="hero-footer">
        <span>AN OPEN SPACE FOR CREATIVE MINDS</span>
        <span>EST. 2026</span>
    </div>

</section>

    <section class="intro-section">
        <div>
            <p class="eyebrow">WHO WE ARE</p>
            <h2>Different minds.<br>One creative space.</h2>
        </div>
        <div class="intro-copy">
            <p>
                We bring students together through visual art, photography,
                design, exhibitions and collaborative projects.
                Whether you're experienced or just starting out,
                there's room for your ideas here.
            </p>
            <a href="about.php" class="text-link">Discover our club →</a>
        </div>
    </section>

    <section class="feature-section">
        <div class="section-heading">
            <div>
                <p class="eyebrow">WHAT WE DO</p>
                <h2>Ideas into experiences.</h2>
            </div>
            <a href="activities.php" class="text-link">All activities →</a>
        </div>

        <div class="feature-content">
            <div class="feature-grid">
                <article class="feature-card">
                    <span class="card-number">01</span>
                    <h3>Workshops</h3>
                    <p>Learn new techniques, practise your skills and experiment.</p>
                </article>

                <article class="feature-card">
                    <span class="card-number">02</span>
                    <h3>Exhibitions</h3>
                    <p>Showcase original work and celebrate student creativity.</p>
                </article>

                <article class="feature-card">
                    <span class="card-number">03</span>
                    <h3>Collaboration</h3>
                    <p>Meet creative people and turn shared ideas into projects.</p>
                </article>
            </div>

            <figure class="feature-image">
                <img src="assets/images/workshops/workshops.jpeg"
                     alt="ARTCLUB members painting together during a workshop"
                     loading="lazy">
                <figcaption>CREATIVITY, MADE TOGETHER</figcaption>
            </figure>
        </div>
    </section>

    <section class="board-section">
        <div class="section-heading">
            <div>
                <p class="eyebrow">MEET THE BOARD</p>
                <h2>Meet the board members.</h2>
            </div>
            <a href="about.php" class="text-link">Our story →</a>
        </div>

        <div class="board-grid">
            <article class="board-card">
                <img src="assets/images/board/michael.svg.jpeg" alt="Portrait of Michael Masiyachengo, club president">
                <div class="member-info">
                    <h3>Michael Masiyachengo</h3>
                    <p>President</p>
                </div>
            </article>

            <article class="board-card">
                <img src="assets/images/board/leslie.svg.jpeg" alt="Portrait of Leslie Sarai, vice president">
                <div class="member-info">
                    <h3>Leslie Sarai</h3>
                    <p>Vice President</p>
                </div>
            </article>

            <article class="board-card">
                <img src="assets/images/board/ashley.svg.jpeg" alt="Portrait of Ashley Marumisa, events coordinator">
                <div class="member-info">
                    <h3>Ashley Marumisa</h3>
                    <p>Events Coordinator</p>
                </div>
            </article>

            <article class="board-card">
                <img src="assets/images/board/nyasha.svg.jpeg" alt="Portrait of Nyasha Kuwana, creative director">
                <div class="member-info">
                    <h3>Nyasha Kuwana</h3>
                    <p>Creative Director</p>
                </div>
            </article>

            <article class="board-card">
                <img src="assets/images/board/343.jpeg" alt="Portrait of Chapfiwa, ARTCLUB patron">
                <div class="member-info">
                    <h3>Chapfiwa</h3>
                    <p>Patron</p>
                </div>
            </article>
        </div>
    </section>
</main>

<footer class="footer home-contact-footer" id="contact">
    <div class="contact-footer-brand">
        <a href="index.php" class="logo footer-brand-logo" aria-label="ARTCLUB home">
            <img src="assets/images/logo/Gemini_Generated_Image_ql3rzwql3rzwql3r.jpeg"
                 alt="">
            <span class="footer-brand-name"><span>ART</span><span>CLUB</span></span>
        </a>
        <p>IMAGINE | CREATE | INSPIRE</p>
        <p>&copy; <?= date("Y") ?> Art Club. All rights reserved.</p>
    </div>
    <div class="contact-footer-details">
        <p class="contact-footer-label">GET IN TOUCH</p>
        <h2>Contact us</h2>
        <div class="contact-footer-links">
            <a href="mailto:masiyachengosimbanashe@gmail.com">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                    <path d="m4 7 8 6 8-6"></path>
                </svg>
                <span>masiyachengosimbanashe@gmail.com</span>
            </a>
            <a href="tel:+263787846808">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M7 3h3l2 5-2 1.5a14 14 0 0 0 4.5 4.5L16 12l5 2v3c0 1.1-.9 2-2 2C10.7 19 5 13.3 5 6c0-1.7.3-3 2-3Z"></path>
                </svg>
                <span>078 784 6808</span>
            </a>
            <p class="contact-footer-location">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"></path>
                    <circle cx="12" cy="10" r="2.5"></circle>
                </svg>
                <span>Harare Institute of Technology</span>
            </p>
        </div>
        <div class="contact-social-links" aria-label="ARTCLUB social media">
            <a href="https://wa.me/263787846808"
               target="_blank" rel="noopener noreferrer"
               aria-label="Chat with ARTCLUB on WhatsApp">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M20.5 11.7a8.5 8.5 0 0 1-12.6 7.4L3 20l.9-4.7A8.5 8.5 0 1 1 20.5 11.7Z"></path>
                    <path d="M8.2 7.8c.2-.5.5-.5.8-.5h.5c.2 0 .4.1.5.4l.7 1.7c.1.3.1.4-.1.6l-.5.6c-.2.2-.2.4 0 .7.5.9 1.3 1.6 2.2 2.1.3.2.5.2.7-.1l.7-.8c.2-.2.4-.2.7-.1l1.5.7c.3.1.4.3.4.5 0 .3-.2 1.2-.8 1.6-.5.4-1.1.6-1.8.4-1-.2-2.2-.7-3.6-1.9-1.1-.9-2-2.1-2.3-3.1-.3-.9 0-1.7.4-2.3.2-.3.5-.5.7-.5Z"></path>
                </svg>
                <span>WhatsApp</span>
            </a>
            <a href="https://www.instagram.com/sjc_artclub_2025/?hl=en"
               target="_blank" rel="noopener noreferrer"
               aria-label="Visit ARTCLUB on Instagram">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <rect x="3" y="3" width="18" height="18" rx="5"></rect>
                    <circle cx="12" cy="12" r="4"></circle>
                    <circle class="social-icon-dot" cx="17.5" cy="6.7" r="1"></circle>
                </svg>
                <span>Instagram</span>
            </a>
        </div>
    </div>
</footer>

</body>
</html>
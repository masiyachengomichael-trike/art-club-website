<?php
$pageTitle = "Activities | ARTCLUB";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore workshops, exhibitions, and creative collaborations with ARTCLUB.">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8") ?></title>
    <link rel="stylesheet" href="assets/css/style.css?v=20261011-brand">
    <script src="assets/js/script.js?v=20261011-back" defer></script>
</head>
<body class="activities-page">

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
        <a href="activities.php" class="active" aria-current="page">Activities</a>
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
    <section class="activities-hero">
        <div class="activities-hero-copy">
            <p class="activities-kicker">ARTCLUB · MAKE SOMETHING TOGETHER</p>
            <h1>Ideas are<br>better in motion.</h1>
            <p>
                Explore a creative practice, share what you make, and find
                new ways to work together.
            </p>
            <a href="#activity-programme" class="activities-hero-link">
                Explore what we do <span aria-hidden="true">↓</span>
            </a>
        </div>
        <figure class="activities-hero-image">
            <img src="assets/images/hero/slide1.jpg"
                 alt="ARTCLUB members sharing a moment as a creative community">
            <figcaption>ARTCLUB · COMMUNITY IN PRACTICE</figcaption>
        </figure>
        <span class="activities-hero-index" aria-hidden="true">01 / 03</span>
    </section>

    <section class="activities-intro">
        <p class="activities-section-label">WHAT WE DO</p>
        <div>
            <h2>Make. Share.<br>See what’s possible.</h2>
            <p>
                ARTCLUB creates space for students to learn new techniques,
                show original work, and turn shared ideas into collaborative
                projects. Come with experience or simply bring your curiosity.
            </p>
        </div>
    </section>

    <section class="activities-programme" id="activity-programme">
        <div class="activities-heading">
            <div>
                <p class="activities-section-label">FIND YOUR WAY IN</p>
                <h2>Ways to take part</h2>
            </div>
            <p>Explore a practice, meet other makers, and make room for new ideas.</p>
        </div>

        <div class="activities-grid">
            <article class="activity-card activity-card-workshops">
                <a class="activity-image" href="join.php" aria-label="Find out about joining ARTCLUB workshops">
                    <img src="assets/images/hero/slide3.jpg"
                         alt="ARTCLUB members gathered closely together">
                    <span class="activity-image-index">01 / LEARN</span>
                    <span class="activity-image-arrow" aria-hidden="true">↗</span>
                </a>
                <div class="activity-card-copy">
                    <p class="activity-card-label">LEARN & EXPERIMENT</p>
                    <h3>Workshops</h3>
                    <p>
                        Try new techniques, practise your skills, and follow
                        an idea wherever it leads.
                    </p>
                    <a href="join.php" class="activity-card-link">
                        Get involved <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </article>

            <article class="activity-card activity-card-exhibitions">
                <a class="activity-image" href="exhibition.php" aria-label="Explore ARTCLUB exhibitions">
                    <img src="assets/images/hero/slide2.jpg"
                         alt="A group of ARTCLUB members together">
                    <span class="activity-image-index">02 / SHARE</span>
                    <span class="activity-image-arrow" aria-hidden="true">↗</span>
                </a>
                <div class="activity-card-copy">
                    <p class="activity-card-label">SHOW & CELEBRATE</p>
                    <h3>Exhibitions</h3>
                    <p>
                        Share original work and celebrate the many perspectives
                        in our student community.
                    </p>
                    <a href="exhibition.php" class="activity-card-link">
                        Visit the exhibition <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </article>

            <article class="activity-card activity-card-collaboration">
                <a class="activity-image" href="join.php" aria-label="Find out about creative collaborations">
                    <img src="assets/images/hero/slide1.jpg"
                         alt="ARTCLUB members connecting as a group">
                    <span class="activity-image-index">03 / CONNECT</span>
                    <span class="activity-image-arrow" aria-hidden="true">↗</span>
                </a>
                <div class="activity-card-copy">
                    <p class="activity-card-label">MEET & MAKE</p>
                    <h3>Collaboration</h3>
                    <p>
                        Meet fellow creatives and build a shared project from
                        the first conversation onward.
                    </p>
                    <a href="join.php" class="activity-card-link">
                        Create together <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </article>
        </div>
    </section>

    <section class="activities-festival" aria-labelledby="festival-heading">
        <div class="activities-festival-heading">
            <div>
                <p class="activities-section-label">EVENTS · FESTIVAL · COMMUNITY</p>
                <h2 id="festival-heading">Good days. Great ideas.</h2>
            </div>
            <p>
                A peek at the energy, creativity, and shared moments from
                ARTCLUB events and festival days.
            </p>
        </div>

        <div class="festival-gallery">
            <a class="festival-tile festival-tile-featured"
               href="assets/images/events/676.jpeg"
               target="_blank" rel="noopener"
               aria-label="Open photo of members enjoying a colourful outdoor activity">
                <img src="assets/images/events/676.jpeg"
                     alt="ARTCLUB members laughing together during an outdoor activity"
                     loading="lazy">
                <span class="festival-tile-caption">
                    <span>OUTDOOR MOMENTS</span><span aria-hidden="true">↗</span>
                </span>
            </a>
            <a class="festival-tile festival-tile-vr"
               href="assets/images/events/00.jpeg"
               target="_blank" rel="noopener"
               aria-label="Open photo of a member trying a virtual reality activity">
                <img src="assets/images/events/00.jpeg"
                     alt="A member tries a virtual reality experience at an event"
                     loading="lazy">
                <span class="festival-tile-caption">
                    <span>TRY SOMETHING NEW</span><span aria-hidden="true">↗</span>
                </span>
            </a>
            <a class="festival-tile festival-tile-crowd"
               href="assets/images/events/76.jpeg"
               target="_blank" rel="noopener"
               aria-label="Open photo of a lively community gathering">
                <img src="assets/images/events/76.jpeg"
                     alt="A lively crowd gathered together at a community event"
                     loading="lazy">
                <span class="festival-tile-caption">
                    <span>ALL TOGETHER</span><span aria-hidden="true">↗</span>
                </span>
            </a>
            <a class="festival-tile festival-tile-stage"
               href="assets/images/events/8569.jpeg"
               target="_blank" rel="noopener"
               aria-label="Open photo of a speaker engaging with an audience">
                <img src="assets/images/events/8569.jpeg"
                     alt="A speaker shares a moment with the gathered audience"
                     loading="lazy">
                <span class="festival-tile-caption">
                    <span>IDEAS IN THE ROOM</span><span aria-hidden="true">↗</span>
                </span>
            </a>
        </div>
    </section>

    <section class="activities-donations" aria-labelledby="donations-heading">
        <div class="donations-gallery" aria-label="Creative supplies and people receiving donated materials">
            <figure class="donations-photo donations-photo-main">
                <img src="assets/images/donations/Donate School Supplies to Children in Sierra Leone.jpeg"
                     alt="Paints, markers, notebooks, and other creative supplies"
                     loading="lazy">
            </figure>
            <figure class="donations-photo donations-photo-people">
                <img src="assets/images/donations/download (11).jpeg"
                     alt="Children holding art and school supplies"
                     loading="lazy">
            </figure>
            <figure class="donations-photo donations-photo-bags">
                <img src="assets/images/donations/download (12).jpeg"
                     alt="Bags prepared with supplies"
                     loading="lazy">
            </figure>
        </div>

        <div class="donations-copy">
            <p class="activities-section-label">MAKE CREATIVITY POSSIBLE</p>
            <h2 id="donations-heading">Give an idea the tools to grow.</h2>
            <blockquote>
                “A little support can put a whole world of possibility into
                someone’s hands.”
            </blockquote>
            <p class="donations-message">
                Your donation can help ARTCLUB make creative activities,
                materials, and shared experiences more accessible. Every
                contribution, big or small, helps us make room for more ideas.
            </p>
            <a class="donations-link" href="join.php">
                Ask how you can donate <span aria-hidden="true">↗</span>
            </a>
            <p class="donations-note">
                Get in touch with ARTCLUB to discuss how you would like to support.
            </p>
        </div>
    </section>

    <section class="activities-people">
        <div class="activities-heading">
            <div>
                <p class="activities-section-label">THE PEOPLE BEHIND THE IDEAS</p>
                <h2>Creative minds, together.</h2>
            </div>
            <a href="join.php" class="activities-text-link">
                Meet the community <span aria-hidden="true">↗</span>
            </a>
        </div>

        <div class="activities-people-grid">
            <figure class="activities-person">
                <img src="assets/images/board/michael.svg.jpeg"
                     alt="Michael Masiyachengo, ARTCLUB President" loading="lazy">
                <figcaption>
                    <span>Michael Masiyachengo</span>
                    <span>President</span>
                </figcaption>
            </figure>
            <figure class="activities-person activities-person-offset">
                <img src="assets/images/board/leslie.svg.jpeg"
                     alt="Leslie Sarai, ARTCLUB Vice President" loading="lazy">
                <figcaption>
                    <span>Leslie Sarai</span>
                    <span>Vice President</span>
                </figcaption>
            </figure>
            <figure class="activities-person">
                <img src="assets/images/board/ashley.svg.jpeg"
                     alt="Ashley Marumisa, ARTCLUB Events Coordinator" loading="lazy">
                <figcaption>
                    <span>Ashley Marumisa</span>
                    <span>Events Coordinator</span>
                </figcaption>
            </figure>
            <figure class="activities-person activities-person-offset">
                <img src="assets/images/board/nyasha.svg.jpeg"
                     alt="Nyasha Kuwana, ARTCLUB Creative Director" loading="lazy">
                <figcaption>
                    <span>Nyasha Kuwana</span>
                    <span>Creative Director</span>
                </figcaption>
            </figure>
            <figure class="activities-person">
                <img src="assets/images/board/343.jpeg"
                     alt="Chapfiwa, ARTCLUB Patron" loading="lazy">
                <figcaption>
                    <span>Chapfiwa</span>
                    <span>Patron</span>
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="activities-feature">
        <figure class="activities-feature-image">
            <img src="assets/images/hero/slide2.jpg"
                 alt="ARTCLUB members together outdoors">
            <figcaption>ARTCLUB · A COMMUNITY OF CREATIVE VOICES</figcaption>
        </figure>
        <div class="activities-feature-copy">
            <p class="activities-section-label">A CREATIVE COMMUNITY</p>
            <h2>There’s no one way to be an artist.</h2>
            <p>
                Bring a sketchbook, a camera, a question, or an idea you have
                not quite figured out yet. ARTCLUB is a place to explore,
                exchange perspectives, and make something with others.
            </p>
            <a href="join.php" class="activities-text-link">
                Find your place in ARTCLUB <span aria-hidden="true">↗</span>
            </a>
        </div>
    </section>

    <section class="activities-cta">
        <p class="activities-section-label">YOUR IDEAS ARE WELCOME</p>
        <h2>Come make<br>something matter.</h2>
        <p>Join ARTCLUB and be part of what we create next.</p>
        <a href="join.php" class="activities-join-button">
            Become a member <span aria-hidden="true">↗</span>
        </a>
    </section>
</main>

<footer class="footer activities-footer">
    <a href="index.php" class="logo footer-brand-logo" aria-label="ARTCLUB home">
        <img src="assets/images/logo/Gemini_Generated_Image_ql3rzwql3rzwql3r.jpeg"
             alt="">
        <span class="footer-brand-name"><span>ART</span><span>CLUB</span></span>
    </a>
    <nav aria-label="Footer navigation">
        <a href="about.php">About</a>
        <a href="activities.php" aria-current="page">Activities</a>
        <a href="gallery.php">Gallery</a>
        <a href="exhibition.php">Exhibition</a>
        <a href="join.php">Join Us</a>
    </nav>
    <p>&copy; <?= date("Y") ?> ARTCLUB. All rights reserved.</p>
</footer>

</body>
</html>

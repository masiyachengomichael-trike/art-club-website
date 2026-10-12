<?php
$pageTitle = "Exhibition | ARTCLUB";
$exhibitionImages = glob(__DIR__ . "/assets/images/exibitions/*.{jpg,jpeg,png,webp,gif}", GLOB_BRACE);
if ($exhibitionImages === false) {
    $exhibitionImages = [];
}
sort($exhibitionImages, SORT_NATURAL | SORT_FLAG_CASE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover the ARTCLUB exhibition and explore creative work by our members.">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8") ?></title>
    <link rel="stylesheet" href="assets/css/style.css?v=20261011-brand">
    <script src="assets/js/script.js?v=20261011-exhibition" defer></script>
</head>
<body class="exhibition-page">

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
        <a href="exhibition.php" class="active" aria-current="page">Exhibition</a>
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
    <section class="exhibition-hero" aria-labelledby="exhibition-title">
        <div class="exhibition-hero-image" aria-hidden="true"></div>
        <div class="exhibition-hero-content exhibition-reveal">
            <p class="exhibition-kicker">ARTCLUB PRESENTS</p>
            <h1 id="exhibition-title">ART, WITHOUT<br>LIMITS.</h1>
            <p class="exhibition-hero-description">
                A space for bold ideas, original perspectives, and the next
                generation of creative voices.
            </p>
            <div class="exhibition-hero-actions">
                <a class="exhibition-button exhibition-button-light" href="#selected-works">
                    Explore the exhibition <span aria-hidden="true">↗</span>
                </a>
                <a class="exhibition-scroll-link" href="#experience">
                    Discover the collection <span aria-hidden="true">↓</span>
                </a>
            </div>
        </div>
        <p class="exhibition-index" aria-label="Exhibition introduction, 1 of 1">
            <span>01</span><i aria-hidden="true"></i><span>01</span>
        </p>
        <p class="exhibition-photo-note">ARTCLUB COMMUNITY · PHOTOGRAPH FROM THE CLUB</p>
    </section>

    <section class="exhibition-introduction exhibition-section" id="experience">
        <p class="exhibition-section-label exhibition-reveal">THE EXPERIENCE</p>
        <div class="exhibition-introduction-copy exhibition-reveal">
            <h2>More than art.<br>A different perspective.</h2>
            <p>
                The ARTCLUB exhibition celebrates the creativity, experimentation,
                and ideas of our members. It is a place to encounter new points of
                view and see what happens when a community makes space for
                expression.
            </p>
        </div>
    </section>

    <section class="selected-works exhibition-section" id="selected-works">
        <div class="exhibition-section-heading exhibition-reveal">
            <div>
                <p class="exhibition-section-label">FROM THE COMMUNITY</p>
                <h2>Selected Works</h2>
            </div>
            <p class="exhibition-section-caption">A selection of ideas brought to life.</p>
        </div>

        <?php if ($exhibitionImages !== []): ?>
            <div class="artwork-gallery">
                <?php foreach ($exhibitionImages as $index => $imagePath):
                    $imageName = basename($imagePath);
                    $imageUrl = "assets/images/exibitions/" . rawurlencode($imageName);
                    $imageTitle = "Exhibition moment " . str_pad((string) ($index + 1), 2, "0", STR_PAD_LEFT);
                    ?>
                    <article class="artwork-item exhibition-reveal">
                        <button class="artwork-image artwork-gallery-image" type="button"
                                data-artwork-viewer
                                data-viewer-title="<?= htmlspecialchars($imageTitle, ENT_QUOTES, "UTF-8") ?>"
                                data-viewer-artist="ARTCLUB community"
                                data-viewer-medium="Exhibition photograph"
                                data-viewer-src="<?= htmlspecialchars($imageUrl, ENT_QUOTES, "UTF-8") ?>"
                                aria-label="View <?= htmlspecialchars($imageTitle, ENT_QUOTES, "UTF-8") ?>">
                            <img src="<?= htmlspecialchars($imageUrl, ENT_QUOTES, "UTF-8") ?>"
                                 alt="<?= htmlspecialchars($imageTitle . " from the ARTCLUB exhibition", ENT_QUOTES, "UTF-8") ?>"
                                 loading="lazy">
                            <span class="artwork-view-indicator" aria-hidden="true">VIEW PHOTO ↗</span>
                        </button>
                        <div class="artwork-caption">
                            <h3><?= htmlspecialchars($imageTitle, ENT_QUOTES, "UTF-8") ?></h3>
                            <p>ARTCLUB community <span>·</span> Exhibition photograph</p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="archive-empty">
                <p>No exhibition photographs found yet.</p>
                <span>Add image files to assets/images/exibitions.</span>
            </div>
        <?php endif; ?>
    </section>

    <section class="visit-section exhibition-section">
        <div class="visit-heading exhibition-reveal">
            <p class="exhibition-section-label">INFORMATION</p>
            <h2>Plan Your Visit</h2>
        </div>
        <dl class="visit-details exhibition-reveal">
            <div class="visit-row">
                <dt>Exhibition dates</dt>
                <dd>Details to be announced</dd>
            </div>
            <div class="visit-row">
                <dt>Venue</dt>
                <dd>Details to be announced</dd>
            </div>
            <div class="visit-row">
                <dt>Opening hours</dt>
                <dd>Details to be announced</dd>
            </div>
            <div class="visit-row">
                <dt>Admission</dt>
                <dd>Details to be announced</dd>
            </div>
        </dl>
    </section>

    <section class="archive-section exhibition-section">
        <div class="exhibition-section-heading exhibition-reveal">
            <div>
                <p class="exhibition-section-label">THE ARCHIVE</p>
                <h2>Previously on Display</h2>
            </div>
        </div>
        <div class="archive-empty exhibition-reveal">
            <span class="archive-empty-number" aria-hidden="true">—</span>
            <p>Past exhibitions will be shared here.</p>
            <span>There are no archived exhibitions yet.</span>
        </div>
    </section>

    <section class="exhibition-cta exhibition-reveal">
        <p class="exhibition-section-label">ARTCLUB · OPEN TO EVERY PERSPECTIVE</p>
        <h2>Your work<br>belongs here.</h2>
        <p>Join a community that celebrates creativity, curiosity, and expression.</p>
        <a class="exhibition-button exhibition-button-dark" href="join.php">
            Become a member <span aria-hidden="true">↗</span>
        </a>
    </section>
</main>

<footer class="footer exhibition-footer">
    <a href="index.php" class="logo footer-brand-logo" aria-label="ARTCLUB home">
        <img src="assets/images/logo/Gemini_Generated_Image_ql3rzwql3rzwql3r.jpeg"
             alt="">
        <span class="footer-brand-name"><span>ART</span><span>CLUB</span></span>
    </a>
    <nav aria-label="Footer navigation">
        <a href="about.php">About</a>
        <a href="activities.php">Activities</a>
        <a href="gallery.php">Gallery</a>
        <a href="exhibition.php" aria-current="page">Exhibition</a>
        <a href="join.php">Join Us</a>
    </nav>
    <p>&copy; <?= date("Y") ?> ARTCLUB. All rights reserved.</p>
</footer>

<dialog class="artwork-viewer" id="artworkViewer" aria-label="Artwork viewer">
    <div class="artwork-viewer-panel">
        <button class="artwork-viewer-close" type="button"
                aria-label="Close artwork viewer">&times;</button>
        <img class="artwork-viewer-image" id="viewerImage" alt="" hidden>
        <div class="artwork-viewer-placeholder" id="viewerPlaceholder" role="img"
             aria-label="Artwork image has not been added">
            <span class="artwork-placeholder-mark" aria-hidden="true">+</span>
            <span>Artwork image to be added</span>
        </div>
        <div class="artwork-viewer-caption">
            <h2 id="viewerTitle">Artwork title to be added</h2>
            <p id="viewerMetadata">Artist name to be added · Medium or category to be added</p>
        </div>
    </div>
</dialog>

</body>
</html>

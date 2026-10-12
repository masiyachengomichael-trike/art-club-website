
const themeToggle = document.getElementById("themeToggle");
const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");

const backButton = document.createElement("button");
backButton.className = "page-back-button";
backButton.type = "button";
backButton.setAttribute("aria-label", "Go back");
backButton.title = "Go back";
backButton.innerHTML = '<span aria-hidden="true">←</span>';
backButton.addEventListener("click", () => {
    if (document.referrer) {
        window.history.back();
    } else {
        window.location.assign("index.php");
    }
});
document.body.append(backButton);

// Restore the saved theme.
const savedTheme = localStorage.getItem("artClubTheme");

if (savedTheme === "dark") {
    document.body.classList.add("dark");
}

function updateThemeButton() {
    const nextTheme = document.body.classList.contains("dark")
        ? "light"
        : "dark";

    themeToggle.setAttribute("aria-label", `Switch to ${nextTheme} mode`);
    themeToggle.title = `Switch to ${nextTheme} mode`;
}

updateThemeButton();

themeToggle.addEventListener("click", () => {
    document.body.classList.toggle("dark");

    const theme = document.body.classList.contains("dark")
        ? "dark"
        : "light";

    localStorage.setItem("artClubTheme", theme);
    updateThemeButton();
});

// Mobile navigation.
menuToggle.addEventListener("click", () => {
    const isOpen = navLinks.classList.toggle("open");
    menuToggle.setAttribute("aria-expanded", String(isOpen));
});

/* ART CLUB BACKGROUND SLIDESHOW */
const slides = document.querySelectorAll(".hero-slide");
const dots = document.querySelectorAll(".slide-dot");
const nextButton = document.getElementById("nextSlide");
const prevButton = document.getElementById("prevSlide");

let currentSlide = 0;
let slideshowTimer;

function showSlide(index) {
    if (slides.length === 0) return;

    currentSlide = (index + slides.length) % slides.length;

    slides.forEach((slide, i) => {
        slide.classList.toggle("active", i === currentSlide);
    });

    dots.forEach((dot, i) => {
        dot.classList.toggle("active", i === currentSlide);
        dot.setAttribute("aria-current",
            i === currentSlide ? "true" : "false");
    });
}

function startSlideshow() {
    clearInterval(slideshowTimer);

    slideshowTimer = setInterval(() => {
        showSlide(currentSlide + 1);
    }, 5000);
}

if (slides.length > 0) {
    nextButton?.addEventListener("click", () => {
        showSlide(currentSlide + 1);
        startSlideshow();
    });

    prevButton?.addEventListener("click", () => {
        showSlide(currentSlide - 1);
        startSlideshow();
    });

    dots.forEach((dot) => {
        dot.addEventListener("click", () => {
            showSlide(Number(dot.dataset.slide));
            startSlideshow();
        });
    });

    showSlide(0);
    startSlideshow();
}

// Exhibition page entrance transitions.
const exhibitionRevealItems = document.querySelectorAll(".exhibition-reveal");
const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

if ("IntersectionObserver" in window && !prefersReducedMotion.matches && exhibitionRevealItems.length > 0) {
    document.body.classList.add("has-exhibition-reveal");

    const exhibitionObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("is-visible");
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    exhibitionRevealItems.forEach((item) => exhibitionObserver.observe(item));
}

// About page entrance transitions.
const aboutRevealItems = document.querySelectorAll(".about-reveal");

if ("IntersectionObserver" in window && !prefersReducedMotion.matches && aboutRevealItems.length > 0) {
    document.body.classList.add("has-about-reveal");

    const aboutObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("is-visible");
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    aboutRevealItems.forEach((item) => aboutObserver.observe(item));
}

// Accessible exhibition artwork viewer.
const artworkViewer = document.getElementById("artworkViewer");

if (artworkViewer) {
    const viewerTitle = document.getElementById("viewerTitle");
    const viewerMetadata = document.getElementById("viewerMetadata");
    const viewerClose = artworkViewer.querySelector(".artwork-viewer-close");
    const viewerImage = document.getElementById("viewerImage");
    const viewerPlaceholder = document.getElementById("viewerPlaceholder");

    document.querySelectorAll("[data-artwork-viewer]").forEach((artworkButton) => {
        artworkButton.addEventListener("click", () => {
            viewerTitle.textContent = artworkButton.dataset.viewerTitle;
            viewerMetadata.textContent =
                `${artworkButton.dataset.viewerArtist} · ${artworkButton.dataset.viewerMedium}`;
            if (artworkButton.dataset.viewerSrc) {
                viewerImage.src = artworkButton.dataset.viewerSrc;
                viewerImage.alt = artworkButton.dataset.viewerTitle;
                viewerImage.hidden = false;
                viewerPlaceholder.hidden = true;
            } else {
                viewerImage.hidden = true;
                viewerImage.removeAttribute("src");
                viewerPlaceholder.hidden = false;
            }
            artworkViewer.showModal();
        });
    });

    viewerClose.addEventListener("click", () => artworkViewer.close());

    artworkViewer.addEventListener("click", (event) => {
        if (event.target === artworkViewer) {
            artworkViewer.close();
        }
    });
}

const membershipForm = document.getElementById("membershipForm");
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

async function submitAuthRequest(form, action, feedback) {
    const submitButton = form.querySelector('button[type="submit"]');
    submitButton.disabled = true;
    feedback.textContent = "Please wait…";

    try {
        const formData = new FormData(form);
        formData.set("action", action);
        formData.set("csrf_token", csrfToken || "");
        const response = await fetch("auth.php", {
            method: "POST",
            body: formData,
            headers: { Accept: "application/json" },
            credentials: "same-origin"
        });
        const result = await response.json();
        feedback.textContent = result.message || "The request could not be completed.";
        if (!response.ok || !result.success) {
            return false;
        }
        return result;
    } catch (error) {
        feedback.textContent =
            "We couldn’t reach the server. Please check your connection and try again.";
        return false;
    } finally {
        submitButton.disabled = false;
    }
}

if (membershipForm) {
    const feedback = document.getElementById("membershipFormFeedback");
    const fields = document.getElementById("joinApplicationFields");
    const verificationEmail = document.getElementById("joinVerificationEmail");
    const otpStep = document.getElementById("joinOtpStep");
    const otpInput = document.getElementById("joinOtp");
    const submitLabel = document.getElementById("joinSubmitLabel");
    const resendButton = document.getElementById("joinResendOtp");
    const changeEmailButton = document.getElementById("joinChangeEmail");

    membershipForm.addEventListener("submit", async (event) => {
        event.preventDefault();
        const verifying = membershipForm.dataset.stage === "verify";
        const result = await submitAuthRequest(
            membershipForm,
            verifying ? "verify_signup" : "start_signup",
            feedback
        );
        if (result && !verifying) {
            membershipForm.dataset.stage = "verify";
            verificationEmail.value = new FormData(membershipForm).get("email");
            verificationEmail.disabled = false;
            fields.hidden = true;
            fields.querySelectorAll("input, select, textarea").forEach((field) => {
                field.disabled = true;
            });
            otpStep.hidden = false;
            otpInput.disabled = false;
            otpInput.required = true;
            submitLabel.textContent = "Verify email & join";
            otpInput.focus();
        } else if (result && result.redirect) {
            window.location.assign(result.redirect);
        }
    });

    resendButton.addEventListener("click", async () => {
        const result = await submitAuthRequest(
            membershipForm,
            "resend_signup",
            feedback
        );
        if (result) {
            otpInput.focus();
        }
    });

    changeEmailButton.addEventListener("click", () => {
        membershipForm.dataset.stage = "start";
        fields.hidden = false;
        fields.querySelectorAll("input, select, textarea").forEach((field) => {
            field.disabled = false;
        });
        verificationEmail.disabled = true;
        otpStep.hidden = true;
        otpInput.disabled = true;
        otpInput.required = false;
        otpInput.value = "";
        submitLabel.textContent = "Email me a verification code";
        feedback.textContent = "";
    });
}

const loginForm = document.getElementById("loginForm");

if (loginForm) {
    const feedback = document.getElementById("loginFeedback");
    const otpStep = document.getElementById("loginOtpStep");
    const otpInput = document.getElementById("loginOtp");
    const submitLabel = document.getElementById("loginSubmitLabel");
    const resendButton = document.getElementById("loginResendOtp");
    const changeEmailButton = document.getElementById("loginChangeEmail");

    loginForm.addEventListener("submit", async (event) => {
        event.preventDefault();
        const verifying = loginForm.dataset.stage === "verify";
        const result = await submitAuthRequest(
            loginForm,
            verifying ? "verify_login" : "start_login",
            feedback
        );
        if (result && !verifying) {
            loginForm.dataset.stage = "verify";
            otpStep.hidden = false;
            otpInput.disabled = false;
            otpInput.required = true;
            submitLabel.textContent = "Verify code & sign in";
            otpInput.focus();
        } else if (result && result.redirect) {
            window.location.assign(result.redirect);
        }
    });

    resendButton.addEventListener("click", async () => {
        const result = await submitAuthRequest(loginForm, "resend_login", feedback);
        if (result) {
            otpInput.focus();
        }
    });

    changeEmailButton.addEventListener("click", () => {
        loginForm.dataset.stage = "start";
        otpStep.hidden = true;
        otpInput.disabled = true;
        otpInput.required = false;
        otpInput.value = "";
        submitLabel.textContent = "Email me a sign-in code";
        feedback.textContent = "";
    });
}
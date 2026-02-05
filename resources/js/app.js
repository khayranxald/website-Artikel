import "./bootstrap";
import Alpine from "alpinejs";
import "./dark-mode";
import "./like";
import "./toast";
import "./scroll-to-top";

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Page Load Progress Bar
window.addEventListener("load", () => {
    const loader = document.querySelector(".page-loader");
    if (loader) {
        loader.style.opacity = "0";
        setTimeout(() => loader.remove(), 300);
    }
});

// Add page loader on navigation
document.addEventListener("DOMContentLoaded", () => {
    // Create loader
    const loader = document.createElement("div");
    loader.className = "page-loader opacity-0";
    document.body.appendChild(loader);

    // Show on link clicks
    document.querySelectorAll('a:not([target="_blank"])').forEach((link) => {
        link.addEventListener("click", (e) => {
            if (!e.defaultPrevented && link.href && !link.href.includes("#")) {
                loader.style.opacity = "1";
            }
        });
    });
});

// Lazy load images
if ("IntersectionObserver" in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove("opacity-0");
                img.classList.add(
                    "opacity-100",
                    "transition-opacity",
                    "duration-500",
                );
                imageObserver.unobserve(img);
            }
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll("img[data-src]").forEach((img) => {
            imageObserver.observe(img);
        });
    });
}

// Smooth scroll for anchor links
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const href = this.getAttribute("href");
            if (href !== "#" && href !== "") {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                }
            }
        });
    });
});

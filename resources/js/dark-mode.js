// Enhanced Dark Mode with Database Sync
class DarkModeManager {
    constructor() {
        this.init();
    }

    init() {
        // Load saved preference
        this.loadTheme();

        // Add transition class after page load to avoid flash
        window.addEventListener("load", () => {
            document.documentElement.classList.add("theme-transition");
        });
    }

    loadTheme() {
        // Priority: Database > LocalStorage > System Preference
        const savedTheme = localStorage.getItem("theme");
        const systemPrefersDark = window.matchMedia(
            "(prefers-color-scheme: dark)",
        ).matches;

        if (savedTheme === "dark" || (!savedTheme && systemPrefersDark)) {
            this.enableDarkMode(false);
        } else {
            this.disableDarkMode(false);
        }
    }

    enableDarkMode(animate = true) {
        if (animate) {
            this.animateToggle();
        }
        document.documentElement.classList.add("dark");
        localStorage.setItem("theme", "dark");
        this.updateIcon("dark");
        this.syncToServer("dark");
    }

    disableDarkMode(animate = true) {
        if (animate) {
            this.animateToggle();
        }
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
        this.updateIcon("light");
        this.syncToServer("light");
    }

    toggle() {
        const isDark = document.documentElement.classList.contains("dark");
        if (isDark) {
            this.disableDarkMode();
        } else {
            this.enableDarkMode();
        }
    }

    animateToggle() {
        // Add ripple effect
        const ripple = document.createElement("div");
        ripple.className = "theme-ripple";
        document.body.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    }

    updateIcon(theme) {
        const sunIcons = document.querySelectorAll(".theme-icon-sun");
        const moonIcons = document.querySelectorAll(".theme-icon-moon");

        if (theme === "dark") {
            sunIcons.forEach((icon) => icon.classList.add("hidden"));
            moonIcons.forEach((icon) => icon.classList.remove("hidden"));
        } else {
            sunIcons.forEach((icon) => icon.classList.remove("hidden"));
            moonIcons.forEach((icon) => icon.classList.add("hidden"));
        }
    }

    async syncToServer(theme) {
        if (!document.querySelector('meta[name="user-authenticated"]')) {
            return; // User not logged in
        }

        try {
            const token = document.querySelector(
                'meta[name="csrf-token"]',
            ).content;
            await fetch("/api/theme/update", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token,
                    Accept: "application/json",
                },
                body: JSON.stringify({ theme }),
            });
        } catch (error) {
            console.log("Theme sync failed:", error);
        }
    }
}

// Initialize
const darkMode = new DarkModeManager();

// Global function for backward compatibility
window.toggleDarkMode = () => darkMode.toggle();

// Listen to system preference changes
window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", (e) => {
        if (!localStorage.getItem("theme")) {
            if (e.matches) {
                darkMode.enableDarkMode(false);
            } else {
                darkMode.disableDarkMode(false);
            }
        }
    });

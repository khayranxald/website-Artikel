// Scroll to Top Button
document.addEventListener("DOMContentLoaded", () => {
    // Create button
    const button = document.createElement("button");
    button.id = "scroll-to-top";
    button.className =
        "fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 text-white rounded-full shadow-2xl hover:shadow-3xl hover:scale-110 transition-all duration-300 z-40 opacity-0 pointer-events-none";
    button.innerHTML = `
        <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    `;
    document.body.appendChild(button);

    // Show/hide on scroll
    let scrollTimeout;
    window.addEventListener("scroll", () => {
        clearTimeout(scrollTimeout);

        if (window.scrollY > 300) {
            button.classList.remove("opacity-0", "pointer-events-none");
            button.classList.add("opacity-100", "pointer-events-auto");
        } else {
            button.classList.add("opacity-0", "pointer-events-none");
            button.classList.remove("opacity-100", "pointer-events-auto");
        }
    });

    // Scroll to top with smooth animation
    button.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });
});

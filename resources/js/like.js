// Like functionality with AJAX
document.addEventListener("DOMContentLoaded", function () {
    const likeButtons = document.querySelectorAll(".like-button");

    likeButtons.forEach((button) => {
        button.addEventListener("click", async function (e) {
            e.preventDefault();

            const postId = this.dataset.postId;
            const url = this.dataset.url;
            const token = document.querySelector(
                'meta[name="csrf-token"]',
            ).content;

            // Add loading state
            this.disabled = true;
            this.classList.add("opacity-50");

            try {
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": token,
                        Accept: "application/json",
                    },
                });

                const data = await response.json();

                if (data.success) {
                    // Update button appearance
                    const heartIcon = this.querySelector(".heart-icon");
                    const countSpan = this.querySelector(".like-count");

                    if (data.liked) {
                        heartIcon.classList.add("liked");
                        this.classList.add(
                            "bg-red-100",
                            "dark:bg-red-900/30",
                            "text-red-600",
                            "dark:text-red-400",
                        );
                        this.classList.remove(
                            "bg-gray-100",
                            "dark:bg-gray-700",
                            "text-gray-600",
                            "dark:text-gray-400",
                        );

                        // Animate heart
                        heartIcon.classList.add("animate-bounce");
                        setTimeout(
                            () => heartIcon.classList.remove("animate-bounce"),
                            500,
                        );
                    } else {
                        heartIcon.classList.remove("liked");
                        this.classList.remove(
                            "bg-red-100",
                            "dark:bg-red-900/30",
                            "text-red-600",
                            "dark:text-red-400",
                        );
                        this.classList.add(
                            "bg-gray-100",
                            "dark:bg-gray-700",
                            "text-gray-600",
                            "dark:text-gray-400",
                        );
                    }

                    // Update count
                    countSpan.textContent = data.likes_count;
                }
            } catch (error) {
                console.error("Error:", error);
                alert("Terjadi kesalahan. Silakan coba lagi.");
            } finally {
                this.disabled = false;
                this.classList.remove("opacity-50");
            }
        });
    });
});

// Toast Notification System
class ToastManager {
    constructor() {
        this.container = this.createContainer();
    }

    createContainer() {
        let container = document.getElementById("toast-container");
        if (!container) {
            container = document.createElement("div");
            container.id = "toast-container";
            container.className = "fixed top-4 right-4 z-50 space-y-2";
            document.body.appendChild(container);
        }
        return container;
    }

    show(message, type = "info", duration = 3000) {
        const toast = document.createElement("div");
        toast.className = `toast-item glass glass-dark rounded-lg px-6 py-4 shadow-2xl transform translate-x-full transition-all duration-300 flex items-center gap-3 max-w-sm ${this.getTypeClass(type)}`;

        const icon = this.getIcon(type);
        toast.innerHTML = `
            ${icon}
            <span class="flex-1 text-gray-800 dark:text-white font-medium">${message}</span>
            <button onclick="this.parentElement.remove()" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        `;

        this.container.appendChild(toast);

        // Trigger animation
        setTimeout(() => {
            toast.classList.remove("translate-x-full");
        }, 10);

        // Auto remove
        if (duration > 0) {
            setTimeout(() => {
                toast.classList.add("translate-x-full", "opacity-0");
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }
    }

    getTypeClass(type) {
        const classes = {
            success: "border-l-4 border-green-500",
            error: "border-l-4 border-red-500",
            warning: "border-l-4 border-yellow-500",
            info: "border-l-4 border-blue-500",
        };
        return classes[type] || classes.info;
    }

    getIcon(type) {
        const icons = {
            success:
                '<svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            error: '<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            warning:
                '<svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>',
            info: '<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        };
        return icons[type] || icons.info;
    }

    success(message, duration) {
        this.show(message, "success", duration);
    }

    error(message, duration) {
        this.show(message, "error", duration);
    }

    warning(message, duration) {
        this.show(message, "warning", duration);
    }

    info(message, duration) {
        this.show(message, "info", duration);
    }
}

// Initialize
window.toast = new ToastManager();

// Show Laravel flash messages as toasts
document.addEventListener("DOMContentLoaded", () => {
    const successMsg = document.querySelector("[data-flash-success]");
    const errorMsg = document.querySelector("[data-flash-error]");
    const infoMsg = document.querySelector("[data-flash-info]");

    if (successMsg) {
        toast.success(successMsg.dataset.flashSuccess);
        successMsg.remove();
    }
    if (errorMsg) {
        toast.error(errorMsg.dataset.flashError);
        errorMsg.remove();
    }
    if (infoMsg) {
        toast.info(infoMsg.dataset.flashInfo);
        infoMsg.remove();
    }
});

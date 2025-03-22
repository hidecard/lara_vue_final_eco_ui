const loadingOverlay = document.getElementById("loading");

window.onload = () => {
    if (loadingOverlay) {
        // Add 'hidden' class to trigger fade-out animation
        loadingOverlay.classList.add("hidden");

        // Listen for animation end event
        loadingOverlay.addEventListener("animationend", () => {
            loadingOverlay.style.display = "none"; // Remove from view completely
        });
    }
};

const loader = {
    show: () => {
        if (loadingOverlay) {
            loadingOverlay.style.display = "flex"; // Ensure it's visible
            loadingOverlay.classList.remove("hidden"); // Remove hidden class

            loadingOverlay.style.backgroundColor = "rgba(0, 0, 0, 0.1)"; // Set transparent background
        }
    },

    hide: () => {
        if (loadingOverlay) {
            loadingOverlay.classList.add("hidden"); // Add hidden class for fade-out animation

            // Wait for the fade-out animation to complete before hiding
            loadingOverlay.addEventListener(
                "animationend",
                () => {
                    loadingOverlay.style.display = "none"; // Hide the loader completely
                    loadingOverlay.style.backgroundColor = ""; // Reset background color
                },
                { once: true }
            ); // Ensure the event listener is executed only once
        }
    },
};

export default loader;

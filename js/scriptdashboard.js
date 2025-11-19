document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".button");

    buttons.forEach(button => {
        button.addEventListener("click", function (event) {
            const confirmNavigation = confirm(`Are you sure you want to go to ${this.textContent}?`);
            if (!confirmNavigation) {
                event.preventDefault(); // Stop navigation if user cancels
            }
        });

        // Add click effect animation
        button.addEventListener("mousedown", function () {
            this.style.transform = "scale(0.95)";
        });

        button.addEventListener("mouseup", function () {
            this.style.transform = "scale(1)";
        });
    });
});

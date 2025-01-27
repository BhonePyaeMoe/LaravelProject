document.addEventListener("DOMContentLoaded", (event) => {
    const menuButton = document.querySelector(".menu");
    const mobile_nav = document.querySelector(".mobile_nav");
    if (menuButton) {
        menuButton.addEventListener("click", () => {
            if (menuButton.classList.contains("menu")) {
                mobile_nav.style.display = "block";
                menuButton.classList.remove("menu");
                menuButton.classList.add("menu_active");
            } else if (menuButton.classList.contains("menu_active")) {
                mobile_nav.style.display = "none";
                menuButton.classList.remove("menu_active");
                menuButton.classList.add("menu");
            }
        });
    }
});

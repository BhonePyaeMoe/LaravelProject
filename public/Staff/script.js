document.addEventListener("DOMContentLoaded", function () {
    const menu = document.querySelector(".dashboard");
    const sidebar = document.querySelector(".sidebar");
    const main = document.querySelector(".main");

    if (menu) {
        menu.addEventListener("click", function () {
            if (sidebar.style.width === "0px") {
                sidebar.style.width = "300px";
                main.style.marginLeft = "300px";
            } else {
                sidebar.style.width = "0px";
                main.style.marginLeft = "0px";
            }
        });
    }
});

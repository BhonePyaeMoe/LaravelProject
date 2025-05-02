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
const btn = document.querySelector(".user_search button[type='submit']");
const ref = document.querySelector(".user_search form a");

if (window.innerWidth <= 768) {
    btn.innerHTML = "🔍︎";
    ref.innerHTML = "⟳";
} else {
    btn.innerHTML = "Search";
    ref.innerHTML = "Refresh";
}

function close_mobile() {
    const mobile_control = document.querySelector(".mbar span");
    const mobile_nav = document.querySelector(".mobile_admin");
    mobile_nav.style.display = "none";
}

function showadminnav() {
    const mobile_control = document.querySelector(".mbar span");
    const mobile_nav = document.querySelector(".mobile_admin");
    mobile_nav.style.display = "block";
}

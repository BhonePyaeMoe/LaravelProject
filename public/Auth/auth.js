document.addEventListener("DOMContentLoaded", function () {
    const loginswitch = document.querySelector(".login_switch");
    const signupswitch = document.querySelector(".signup_switch");
    const panel = document.querySelector(".form_image");
    const login = document.querySelector(".login_display");
    const signup = document.querySelector(".signup_display");

    if (loginswitch) {
        loginswitch.addEventListener("click", function () {
            panel.style.left = "50%";
            login.style.display = "none";
            signup.style.display = "block";
        });
    }
    if (signupswitch) {
        signupswitch.addEventListener("click", function () {
            panel.style.left = "0%";
            login.style.display = "block";
            signup.style.display = "none";
        });
    }
});

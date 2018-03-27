$(document).ready(function () {

    let navbar = document.getElementById("navbar");
    let sticky = navbar.offsetTop;
    window.onscroll = function () {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    };
});
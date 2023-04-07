function setScollbar(prevPosition, currentPosition) {
    if (currentPosition < 0) {
        currentPosition = 0;
    }
    const navbar = document.querySelector(".pnm-navbar");
    if (currentPosition < 180) {
        navbar.classList.remove("pnm-navbar--scrolled");
    } else {
        navbar.classList.add("pnm-navbar--scrolled");
    }

    if (currentPosition > prevPosition) {
        navbar.classList.add("pnm-navbar--hidden");
    } else {
        navbar.classList.remove("pnm-navbar--hidden");
    }

    return currentPosition;
}

var prevPosition = 0;
window.addEventListener("scroll", () => {
    var currentPosition = window.pageYOffset;
    currentPosition = setScollbar(prevPosition, currentPosition);
    prevPosition = currentPosition;
});
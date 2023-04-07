if (document.querySelector(".pnm-langs-current")) {
    let currentLang = document.querySelector(".pnm-langs-current");
    let langSwitcher = document.querySelector(".pnm-langs-switcher");
    let langSwitcherItems = langSwitcher.querySelectorAll(".pnm-langs-switcher-link");
    currentLang.addEventListener("click", () => {
        langSwitcherItems.forEach((item) => {
            item.animate([
                { opacity: 0, transform: "translateY(10px)", visibility: "hidden" },
                { opacity: 1, transform: "translateY(0)", visibility: "visible" }
            ], {
                duration: 300,
                easing: "ease-in-out",
                fill: "forwards"
            });
        });
    });
}
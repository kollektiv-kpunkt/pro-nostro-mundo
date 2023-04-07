if (document.querySelector(".pnm-subnav-toggle")) {
    document.querySelector(".pnm-subnav-toggle").addEventListener("click", function (e) {
        e.preventDefault();
        const toggle = document.querySelector(".pnm-subnav-toggle");
        const subnav = document.querySelector(".pnm-subnav-container");

        if (toggle.classList.contains("is-active")) {
            toggle.classList.remove("is-active");
            subnav.animate([
                { maxHeight: subnav.scrollHeight + "px" },
                { maxHeight: "0px" }
            ], {
                duration: 300,
                easing: "ease-in-out",
                fill: "forwards"
            });
        } else {
            toggle.classList.add("is-active");
            subnav.animate([
                { maxHeight: "0px" },
                { maxHeight: subnav.scrollHeight + "px" }
            ], {
                duration: 300,
                easing: "ease-in-out",
                fill: "forwards"
            });
        }

    });
}
if (document.querySelector(".pnm-navbar-main-menu .menu-item.menu-item-has-children")) {
    let menuItems = document.querySelectorAll(".pnm-navbar-main-menu .menu-item.menu-item-has-children");
    menuItems.forEach((item) => {
        item.addEventListener("click", (e) => {
            item = e.target.closest(".menu-item");
            if (item.classList.contains("menu-item-has-children")) {
                e.preventDefault();
            }
            let submenu = item.querySelector(".sub-menu");
            if (submenu === null) {
                submenu = item.parentElement.closest(".menu-item").click();
                return;
            }
            if (document.querySelector(".menu-item.active")) {
                let activeItem = document.querySelector(".menu-item.active");
                if (activeItem !== item) {
                    document.querySelector(".menu-item.active").click();
                }
            }
            item.classList.toggle("active");
            let submenuItems = submenu.querySelectorAll(".menu-item");
            if (item.classList.contains("active")) {
                submenu.animate([
                    { opacity: 0, visibility: "hidden" },
                    { opacity: 1, visibility: "visible" }
                ],
                    {
                        duration: 300,
                        easing: "ease-in-out",
                        fill: "forwards"
                    }
                );
                let i = 0;
                submenuItems.forEach((item) => {
                    setTimeout(() => {
                        item.animate([
                            { opacity: 0, transform: "translateY(10px)" },
                            { opacity: 1, transform: "translateY(0)" }
                        ],
                            {
                                duration: 300,
                                easing: "ease-in-out",
                                fill: "forwards"
                            }
                        );
                    }, i++ * 100);
                });
            } else {
                let i = submenuItems.length;
                submenuItems.forEach((item) => {
                    setTimeout(() => {
                        item.animate([
                            { opacity: 1, transform: "translateY(0)" },
                            { opacity: 0, transform: "translateY(10px)" }
                        ],
                            {
                                duration: 300,
                                easing: "ease-in-out",
                                fill: "forwards"
                            }
                        );
                    }, i-- * 100);
                });
                setTimeout(() => {
                    submenu.animate([
                        { opacity: 1, visibility: "visible" },
                        { opacity: 0, visibility: "hidden" }
                    ],
                        {
                            duration: 300,
                            easing: "ease-in-out",
                            fill: "forwards"
                        }
                    );
                    window.location.href = item.querySelector("a").href;
                }, submenuItems.length * 100);
            }
        });
    });
}
if (document.querySelector(".pnm-fries-menu")) {
    let menuButton = document.querySelector(".pnm-fries-menu");
    let menuWrapper = document.querySelector(".pnm-mobile-navmenu-wrapper");
    let menu = document.querySelector(".pnm-mobile-navmenu");

    menuButton.addEventListener("click", () => {
        menuButton.classList.toggle("pnm-fries-menu--active");
        if (menuButton.classList.contains("pnm-fries-menu--active")) {
            menuButton.classList.add("pnm-fries-menu--animating");
            setTimeout(() => {
                menuButton.classList.add("pnm-fries-menu--cross");
            }, 150);
        } else {
            menuButton.classList.remove("pnm-fries-menu--cross");
            setTimeout(() => {
                menuButton.classList.remove("pnm-fries-menu--animating");
            }, 150);
        }
        if (menuButton.classList.contains("pnm-fries-menu--active")) {
            openMenu(menuWrapper, menu);
        } else {
            closeMenu(menuWrapper, menu);
        }
    });

    let menuItems = menu.querySelectorAll(".menu-item.menu-item-has-children>a");
    menuItems.forEach((item) => {
        item.addEventListener("click", (e) => {
            console.log(e.target);
            let item = e.target.closest(".menu-item");
            e.preventDefault();
            if (item.classList.contains("menu-item-has-children")) {
                e.preventDefault();
            }
            let submenu = item.querySelector(".sub-menu");
            if (submenu === null) {
                item.parentElement.closest(".menu-item").querySelector("a").click();
                return;
            }
            if (submenu.classList.contains("open")) {
                closeSubmenu(menuWrapper, submenu);
                submenu.classList.remove("open");
            } else {
                openSubmenu(menuWrapper, submenu);
                submenu.classList.add("open");
            }
        });
    });
}

function openMenu(menuWrapper, menu) {
    menuWrapper.animate([
        { opacity: 0, visibility: "hidden", maxHeight: "0" },
        { opacity: 1, visibility: "visible", maxHeight: menuWrapper.scrollHeight + "px" }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards"
    });
}

function closeMenu(menuWrapper, menu) {
    menuWrapper.animate([
        { opacity: 1, visibility: "visible", maxHeight: menuWrapper.scrollHeight + "px" },
        { opacity: 0, visibility: "hidden", maxHeight: "0" }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards"
    });

    if (menu.querySelector(".sub-menu.open")) {
        let openSubmenus = menu.querySelectorAll(".sub-menu.open");
        openSubmenus.forEach((submenu) => {
            closeSubmenu(submenu);
        });
    }
}

function openSubmenu(menuWrapper, submenu) {
    let submenuHeight = submenu.scrollHeight + parseInt(getComputedStyle(submenu).marginBottom);
    submenu.animate([
        { opacity: 0, visibility: "hidden", maxHeight: "0" },
        { opacity: 1, visibility: "visible", maxHeight: submenuHeight + "px" }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards"
    });

    menuWrapper.animate([
        { maxHeight: menuWrapper.scrollHeight + "px" },
        { maxHeight: menuWrapper.scrollHeight + submenuHeight + "px" }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards"
    });
}

function closeSubmenu(menuWrapper, submenu) {
    let submenuHeight = submenu.scrollHeight + parseInt(getComputedStyle(submenu).marginBottom);
    submenu.animate([
        { opacity: 1, visibility: "visible", maxHeight: submenuHeight + "px" },
        { opacity: 0, visibility: "hidden", maxHeight: "0" }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards"
    });

    menuWrapper.animate([
        { maxHeight: menuWrapper.scrollHeight + "px" },
        { maxHeight: menuWrapper.scrollHeight - submenuHeight + "px" }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards"
    });
}
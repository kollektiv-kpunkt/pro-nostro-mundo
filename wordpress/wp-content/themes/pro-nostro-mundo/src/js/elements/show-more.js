if (document.querySelector(".pnm-showmore-block")) {
    let showMores = document.querySelectorAll(".pnm-showmore-block");
    showMores.forEach((showMore) => {
        let button = showMore.querySelector(".pnm-showmore-button a");
        let content = showMore.querySelector(".pnm-showmore-content");
        button.addEventListener("click", (e) => {
            e.preventDefault();
            button.classList.toggle("active");
            if (button.classList.contains("active")) {
                content.animate(
                    [
                        { maxHeight: "0px", opacity: 0 },
                        { maxHeight: content.scrollHeight + "px", opacity: 1 },
                    ],
                    {
                        duration: 300,
                        easing: "ease-in-out",
                        fill: "forwards",
                    }
                );
                button.innerText = button.dataset.less;
            } else {
                content.animate(
                    [
                        { maxHeight: content.scrollHeight + "px", opacity: 1 },
                        { maxHeight: "0px", opacity: 0 },
                    ],
                    {
                        duration: 300,
                        easing: "ease-in-out",
                        fill: "forwards",
                    }
                );
                button.innerText = button.dataset.more;
            }
        });
    });
}
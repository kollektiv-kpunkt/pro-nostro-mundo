if (document.querySelector(".pnm-articles-select-ppp")) {
    let selects = document.querySelectorAll(".pnm-articles-select-ppp select");

    selects.forEach((select) => {
        select.addEventListener("change", (e) => {
            let url = new URL(window.location.href);
            let containerId = select.closest(".pnm-article-list-container").querySelector(".pnm-article-list-content").getAttribute("id");
            url.searchParams.set("query[posts_per_page]", e.target.value);
            url.hash = containerId;
            window.location.href = url;
        });
    });
}
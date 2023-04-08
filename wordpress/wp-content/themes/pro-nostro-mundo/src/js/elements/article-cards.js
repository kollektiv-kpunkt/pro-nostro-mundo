if (document.querySelector(".pnm-article-card")) {
    let cards = document.querySelectorAll(".pnm-article-card");
    cards.forEach((card) => {
        card.addEventListener("click", (e) => {
            if (e.target.tagName == "A") return;
            card.querySelector("a.pnm-card-readmore").click();
        });
    });
}
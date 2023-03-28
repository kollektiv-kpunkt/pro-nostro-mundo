if (document.querySelector(".wp-block-spacer")) {
    const spacer = document.querySelectorAll(".wp-block-spacer");
    spacer.forEach((element) => {
        const height = parseInt(element.style.height);
        const rem = parseFloat(getComputedStyle(document.documentElement).fontSize);
        const heightInRem = height / rem;
        element.style.height = height / rem + "rem";
    });
}
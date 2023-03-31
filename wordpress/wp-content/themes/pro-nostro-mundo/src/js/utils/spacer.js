if (document.querySelector(".wp-block-spacer")) {
    const spacer = document.querySelectorAll(".wp-block-spacer");
    let spacerStyles = "";
    spacer.forEach((element) => {
        const uuid = crypto.randomUUID();
        const height = parseInt(element.style.height);
        const rem = parseFloat(getComputedStyle(document.documentElement).fontSize);
        const heightInRem = height / rem;
        element.style.height = "";
        element.id = `spacer-${uuid}`;
        spacerStyles += `
            #${element.id} {
                height: ${heightInRem}rem;
            }
            @media (max-width: 1023px) {
                #${element.id} {
                    height: ${heightInRem * 0.6}rem;
                }
            }

            @media (max-width: 639px) {
                #${element.id} {
                    height: ${heightInRem * 0.4}rem;
                }
            }
        `;
    });
    const style = document.createElement("style");
    style.innerHTML = spacerStyles;
    document.head.appendChild(style);
}
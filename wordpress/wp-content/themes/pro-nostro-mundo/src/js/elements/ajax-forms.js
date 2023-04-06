if (document.querySelector(".pnm-ajax-form")) {
    document.querySelectorAll(".pnm-ajax-form").forEach((form) => {
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const loader = addLoader();
            const formData = new FormData(form);
            const response = await sendAjaxForm(form, formData);
            if (response.status === "success") {
                doAction(response, form);
            } else {
                console.log(response);
            }
            removeLoader(loader);
        });
    });
}

function addLoader() {
    let loader = document.createElement("div");
    loader.classList.add("pnm-form-loader");
    loader.innerHTML = `
    <div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    `;
    document.body.appendChild(loader);
    setTimeout(() => {
        loader.style.opacity = 1;
    }, 100);
    return loader;
}

async function sendAjaxForm(form, formData) {
    const url = form.getAttribute("action");
    const method = form.getAttribute("method");
    const response = await fetch(url, {
        method: method,
        body: formData,
    });
    const data = await response.json();
    return data;
}

function doAction(response, form) {
    switch (response.action) {
        case "display_message":
            form.querySelector(".pnm-form-message").classList.add("!block");
            form.reset();
            break;
    }
}

function removeLoader(loader) {
    loader.style.opacity = 0;
    setTimeout(() => {
        loader.remove();
    }, 500);
}
import Choices from "choices.js";
import "choices.js/public/assets/styles/choices.min.css";

if (document.querySelector(".pnm-choicesjs")) {
    let choices = document.querySelectorAll(".pnm-choicesjs");
    choices.forEach((choice) => {
        const choices = new Choices(choice, {
            searchEnabled: false,
            itemSelectText: "",
            noChoicesText: choice.dataset.noChoicesText,
        });
    });
}

if (document.querySelector(".pnm-searchbar-button")) {
    let searchbarButton = document.querySelector(".pnm-searchbar-button");
    searchbarButton.addEventListener("click", (e) => {
        e.preventDefault();
        searchbarButton.classList.toggle("pnm-searchbar-button--active");
        let searchbarContainer = searchbarButton.closest(".pnm-searchbar-outer").querySelector(".pnm-searchbar-form-container");
        if (searchbarButton.classList.contains("pnm-searchbar-button--active")) {
            searchbarContainer.animate(
                [
                    { maxHeight: "0px" },
                    { maxHeight: searchbarContainer.scrollHeight + "px" },
                ],
                {
                    duration: 300,
                    easing: "ease-in-out",
                    fill: "forwards",
                }
            );
        } else {
            searchbarContainer.animate(
                [
                    { maxHeight: searchbarContainer.scrollHeight + "px" },
                    { maxHeight: "0px" },
                ],
                {
                    duration: 300,
                    easing: "ease-in-out",
                    fill: "forwards",
                }
            );
        }
    });
}

if (document.querySelector("form.pnm-searchbar-form")) {
    let searchbarForm = document.querySelector("form.pnm-searchbar-form");
    searchbarForm.addEventListener("submit", (e) => {
        e.preventDefault();
        alert("Search form submitted");
    });
}
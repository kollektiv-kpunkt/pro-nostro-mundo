import Choices from "choices.js";
import "choices.js/public/assets/styles/choices.min.css";
import { easepick } from "@easepick/core";

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

if (document.querySelector(".pnm-easepick")) {
    let easepickElements = document.querySelectorAll(".pnm-easepick");
    easepickElements.forEach((easepickElement) => {
        let picker = new easepick.create({
            element: easepickElement,
            css: [
                "https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css"
            ],
            zIndex: 10,
            lang: easepickElement.dataset.lang,
            format: "DD.MM.YYYY",
            grid: 2,
            calendars: 2
        })
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
                    { maxHeight: "0px", overflow: "hidden" },
                    { maxHeight: searchbarContainer.scrollHeight + "px", overflow: "hidden", offset: 0.99 },
                    { maxHeight: searchbarContainer.scrollHeight + "px", overflow: "visible" }
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
                    { maxHeight: searchbarContainer.scrollHeight + "px", overflow: "visible" },
                    { maxHeight: searchbarContainer.scrollHeight + "px", overflow: "hidden", offset: 0.01 },
                    { maxHeight: "0px", overflow: "hidden" }
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
        let searchbarForm = e.target;
        let searchbarFormInputs = searchbarForm.querySelectorAll("input, select");
        let filters = {};
        searchbarFormInputs.forEach((input) => {
            if (input.classList.contains("choices__input--cloned")) {
                return;
            }
            let name = input.name;
            let value = "";
            if (input.classList.contains("choices__input") && input.multiple) {
                input.querySelectorAll("option").forEach((option) => {
                    if (option.selected && option.value) {
                        value += option.value + ",";
                    }
                });
            } else {
                value = input.value;
            }
            if (value) {
                filters[name] = value;
            }
        });
        let url = new URL(window.location.href);
        let params = new URLSearchParams(url.search);
        Object.keys(filters).forEach((key) => {
            params.set(`query[${key}]`, filters[key]);
        });
        url.search = params.toString();
        let id = searchbarForm.closest(".pnm-article-list-container").querySelector(".pnm-article-list-content").getAttribute("id");
        url.hash = "#" + id;
        window.location.href = url.toString();
    });

    let resetButton = searchbarForm.querySelector("button[type=reset]");
    resetButton.addEventListener("click", (e) => {
        e.preventDefault();
        let searchbarForm = e.target.closest("form");
        let id = searchbarForm.closest(".pnm-article-list-container").querySelector(".pnm-article-list-content").getAttribute("id");
        let url = new URL(window.location.href);
        url.search = "";
        url.hash = "#" + id;
        window.location.href = url.toString();
    });
}
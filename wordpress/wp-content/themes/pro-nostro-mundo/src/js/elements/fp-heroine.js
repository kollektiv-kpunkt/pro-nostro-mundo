class FPSlider {
    constructor(slider, timeOutLenght) {
        this.slider = slider;
        this.slides = [];
        this.slideLength = 0;
        this.timeOut = null;
        this.timeOutLenght = timeOutLenght || 8000;
        this.currentSlideNumber = 0;
        this.nextSlideNumber = this.nextSlideNumber.bind(this);
        this.imageMarkup = null;
        this.contentMarkup = null;
        this.paginationMarkup = null;
        this.init();
    }

    init() {
        this.slides = JSON.parse(this.slider.querySelector("script[type='text/json']").innerText);
        this.slideLength = this.slides.length;
        this.imageMarkup = this.slider.querySelector(".fp-heroine-slide-img img");
        this.slider.addEventListener("click", () => {
            this.contentMarkup.querySelector("a").click();
        });
        this.contentMarkup = this.slider.querySelector(".fp-heroine-slide-content");
        this.paginationMarkup = this.slider.querySelector(".fp-heroine-slide-pagination");
        setTimeout(() => {
            this.switchSlide();
        }, this.timeOutLenght);
    }

    switchSlide() {
        if (this.timeOut) {
            clearTimeout(this.timeOut);
        }

        const nextSlide = this.slides[this.nextSlideNumber()];
        this.imageMarkup.animate([{ opacity: 1 }, { opacity: 0 }], { duration: 500, fill: "forwards" });
        setTimeout(() => {
            this.imageMarkup.src = nextSlide.slide_image_url;
            this.imageMarkup.alt = nextSlide.title;
            this.imageMarkup.srcset = nextSlide.slide_image_srcset;
            this.imageMarkup.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 500, fill: "forwards" });
        }, 650);

        const contentTitle = this.contentMarkup.querySelector("h2");
        contentTitle.animate([{ opacity: 1 }, { opacity: 0 }], { duration: 500, fill: "forwards" });
        setTimeout(() => {
            contentTitle.innerText = nextSlide.title;
            contentTitle.animate([{ opacity: 0 }, { opacity: 1 }], { duration: 500, fill: "forwards" });
        }, 650);
        this.contentMarkup.querySelector("a").href = nextSlide.target;
        if (nextSlide.newtab.includes("1")) {
            this.contentMarkup.querySelector("a").target = "_blank";
        } else {
            this.contentMarkup.querySelector("a").target = "_self";
        }

        this.paginationMarkup.querySelectorAll("div")[this.currentSlideNumber].classList.remove("bg-pnm-accent");
        this.paginationMarkup.querySelectorAll("div")[this.currentSlideNumber].classList.add("bg-pnm-foreground-80");
        this.paginationMarkup.querySelectorAll("div")[this.nextSlideNumber()].classList.remove("bg-pnm-foreground-80");
        this.paginationMarkup.querySelectorAll("div")[this.nextSlideNumber()].classList.add("bg-pnm-accent");

        this.currentSlideNumber = this.nextSlideNumber();
        this.timeOut = setTimeout(() => this.switchSlide(), this.timeOutLenght);
    }

    nextSlideNumber() {
        let offset = (this.currentSlideNumber + 1) % this.slideLength;
        return offset;
    }
}

if (document.querySelector(".pnm-fp-heroine")) {
    const fpSlider = new FPSlider(document.querySelector(".pnm-fp-heroine"), 10000);
}
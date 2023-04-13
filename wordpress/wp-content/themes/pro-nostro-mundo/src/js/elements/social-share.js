import { Notyf } from "notyf";
import "notyf/notyf.min.css";

if (document.querySelector(".pnm-social-share-inner")) {
    let shareContainer = document.querySelector(".pnm-social-share-inner");
    var shareText = shareContainer.dataset.shareText;
    var shareUrl = shareContainer.dataset.shareUrl;
    let shareLinks = shareContainer.querySelectorAll(".pnm-social-share-link");

    shareLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            let type = link.dataset.type;
            switch (type) {
                case "copylink":
                    navigator.clipboard.writeText(shareText + "\n" + shareUrl);
                    new Notyf().success(link.dataset.successText);
                    break;
                case "facebook":
                    window.open(
                        "https://www.facebook.com/sharer/sharer.php?u=" +
                        shareUrl,
                        "facebook-share-dialog",
                        "width=800,height=600"
                    );
                    break;
                case "twitter":
                    window.open(
                        "https://twitter.com/intent/tweet?text=" +
                        encodeURIComponent(shareText) +
                        "&url=" +
                        shareUrl,
                        "twitter-share-dialog",
                        "width=800,height=600"
                    );
                    break;
                case "whatsapp":
                    window.open(
                        "https://api.whatsapp.com/send?text=" +
                        encodeURIComponent(shareText) +
                        encodeURIComponent("\n") +
                        shareUrl,
                        "_blank"
                    );
                    break;
                case "email":
                    window.open(
                        "mailto:?body=" +
                        encodeURIComponent(shareText) +
                        encodeURIComponent("\n") +
                        shareUrl,
                        "_blank"
                    );
                    break;
                case "linkedin":
                    window.open(
                        "https://www.linkedin.com/shareArticle?mini=true&url=" +
                        shareUrl +
                        "&title=" +
                        encodeURIComponent(shareText),
                        "linkedin-share-dialog",
                        "width=800,height=600"
                    );
                    break;
            }
        });
    });
}
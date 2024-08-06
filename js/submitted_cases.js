function toggleText(link) {
    var text = link.previousElementSibling;
    if (text.style.display === "none") {
        text.style.display = "inline";
        link.textContent = "Read Less";
    } else {
        text.style.display = "none";
        link.textContent = "Read More";
    }
}

function toggleMedia(button) {
    var mediaContainer = button.nextElementSibling;
    if (mediaContainer.style.display === "none") {
        mediaContainer.style.display = "block";
        button.textContent = "Hide Attached File";
    } else {
        mediaContainer.style.display = "none";
        button.textContent = "View Attached File";
    }
}
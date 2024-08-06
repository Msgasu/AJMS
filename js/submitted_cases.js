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


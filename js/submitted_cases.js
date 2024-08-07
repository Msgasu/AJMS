function toggleDocument(statementId) {
    var docContainer = document.getElementById('doc-' + statementId);
    var viewButton = docContainer.nextElementSibling;
    var hideButton = viewButton.nextElementSibling;

    if (docContainer.style.display === 'none') {
        docContainer.style.display = 'block';
        viewButton.style.display = 'none';
        hideButton.style.display = 'inline';
    } else {
        docContainer.style.display = 'none';
        viewButton.style.display = 'inline';
        hideButton.style.display = 'none';
    }
}

function toggleText(link) {
    var moreText = link.previousElementSibling;
    if (moreText.style.display === 'none') {
        moreText.style.display = 'inline';
        link.innerHTML = 'Read Less';
    } else {
        moreText.style.display = 'none';
        link.innerHTML = 'Read More';
    }
}

function updateStatus(selectElement, statementId) {
    var statusId = selectElement.value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../action/update_case_status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("statement_id=" + encodeURIComponent(statementId) + "&status_id=" + encodeURIComponent(statusId));

    xhr.onload = function() {
        if (xhr.status === 200) {
            alert("Status updated successfully.");
        } else {
            alert("Failed to update status.");
        }
    };
}

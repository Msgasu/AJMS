document.getElementById('caseForm').addEventListener('submit', function(event) {
    const report = document.getElementById('report').value;

    if (report.trim() === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter your report or complaint!',
        });
        event.preventDefault();
    }
});

document.getElementById('addFile').addEventListener('click', function() {
    Swal.fire({
        title: 'Feature not implemented',
        text: 'File attachment feature is currently not available.',
        icon: 'info',
    });
});

document.getElementById('deleteFile').addEventListener('click', function() {
    Swal.fire({
        title: 'Feature not implemented',
        text: 'File deletion feature is currently not available.',
        icon: 'info',
    });
});

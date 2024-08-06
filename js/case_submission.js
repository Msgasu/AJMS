// Validate form submission
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

// Handle file input click
document.querySelector('.attach-label').addEventListener('click', function () {
    document.getElementById('file-upload').click();
});

// Handle file selection
document.getElementById('file-upload').addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const previewImg = document.getElementById('preview-img');
            const imagePreview = document.getElementById('image-preview');
            const deleteIcon = document.getElementById('delete-icon');

            // Set image source and show preview
            previewImg.src = e.target.result;
            imagePreview.style.display = 'block';
            deleteIcon.style.display = 'inline'; // Show delete icon
        };
        reader.readAsDataURL(file);
    }
});

// Handle image deletion
document.getElementById('delete-icon').addEventListener('click', function () {
    const fileInput = document.getElementById('file-upload');
    const imagePreview = document.getElementById('image-preview');

    // Clear the file input and hide preview
    fileInput.value = '';
    imagePreview.style.display = 'none';
    this.style.display = 'none'; // Hide delete icon
});

// Handle add file button click
document.getElementById('addFile').addEventListener('click', function() {
    Swal.fire({
        title: 'Feature not implemented',
        text: 'File attachment feature is currently not available.',
        icon: 'info',
    });
});

// Handle delete file button click
document.getElementById('deleteFile').addEventListener('click', function() {
    Swal.fire({
        title: 'Feature not implemented',
        text: 'File deletion feature is currently not available.',
        icon: 'info',
    });
});

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
}


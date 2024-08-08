function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('profileImage');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);

    // Automatically submit the form when a new image is selected
    document.getElementById('profileImageForm').submit();
}

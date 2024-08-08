<?php
//include '../settings/core.php';
// include '../settings/connection.php';


// if(isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK){
//     $userId = $_SESSION['user_id'];
//     $uploadDir = '../uploads/';
//     $fileName = basename($_FILES['profileImage']['name']);
//     $targetFilePath = $uploadDir . $fileName;

//     // Move the uploaded file to the server
//     if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFilePath)){
//         // Update the user's profile image in the database
//         $query = "UPDATE users SET profile_image = ? WHERE pid = ?";
//         $stmt = $con->prepare($query);
//         $stmt->bind_param("si", $targetFilePath, $userId);
//         if($stmt->execute()){
//             echo "Profile image updated successfully.";
//         } else {
//             echo "Failed to update profile image in the database.";
//         }
//     } else {
//         echo "Failed to move the uploaded file.";
//     }
// } else {
//     echo "No file uploaded or an error occurred during the upload.";
// }

if (isset($_POST['submit'])){
    $file = $_FILES['profileImage'];

    $fileName = $_FILES['profileImage']['name'];
    $fileTmpName = $_FILES['profileImage']['tmp_name'];
    $fileSize = $_FILES['profileImage']['size'];
    $fileError = $_FILES['profileImage']['error'];
    $fileType = $_FILES['profileImage']['type'];


    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0)

    }else{
        echo "You cannot upload files of this type!";
    }
}

?>

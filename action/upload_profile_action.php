<?php
//include '../settings/core.php';
 include '../settings/connection.php';


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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profileImage'])) {
    $file = $_FILES['profileImage'];
    $fileName = basename($file['name']);
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Define allowed file extensions and max file size (5MB)
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (in_array($fileExt, $allowed) && $fileSize < 5000000 && $fileError === 0) {
        $newFileName = uniqid('', true) . "." . $fileExt;
        $fileDestination = '../uploads/' . $newFileName;

        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            // Update database
            $userId = $_SESSION['user_id']; // Assumes user ID is stored in session
            $sql = "UPDATE users SET profile_picture = ? WHERE pid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $newFileName, $userId);

            if ($stmt->execute()) {
                header("Location: ../profile_page.php?uploadsuccess");
            } else {
                echo "Database error: " . $stmt->error;
            }
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "Invalid file type or size.";
    }
} else {
    echo "No file uploaded.";
}
?>

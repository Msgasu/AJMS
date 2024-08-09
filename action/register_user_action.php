<?php
include "../settings/connection.php";
session_start(); // Ensure session is started

if (isset($_POST['submit'])) {
    // Sanitize inputs
    $first_name = mysqli_real_escape_string($con, $_POST["firstName"]);
    $last_name = mysqli_real_escape_string($con, $_POST["lastName"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $pass_1 = $_POST["password"];
    $pass_2 = $_POST["confirmPassword"];
    
    // Check if passwords match
    if ($pass_1 !== $pass_2) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hash = password_hash($pass_1, PASSWORD_DEFAULT);

    // Handle file upload
    $profile_picture = null;
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['profile_picture'];
        $fileName = basename($file['name']);
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        // Define allowed file extensions and max file size (5MB)
        $allowed = array('jpg', 'jpeg', 'png');
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExt, $allowed) && $fileSize < 5000000 && $fileError === 0) {
            $newFileName = uniqid('', true) . "." . $fileExt;
            $fileDestination = '../uploads/' . $newFileName;

            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                $profile_picture = $newFileName;
            } else {
                die("Failed to upload file.");
            }
        } else {
            die("Invalid file type or size.");
        }
    }

    // Check if the email is in the admins table
    $checkAdminStmt = $con->prepare("SELECT email FROM admins WHERE email = ?");
    $checkAdminStmt->bind_param("s", $email);
    $checkAdminStmt->execute();
    $checkAdminStmt->store_result();
    
    // Set role_id based on the result
    $role_id = ($checkAdminStmt->num_rows > 0) ? 1 : 2; // 1 for admin, 2 for user
    $checkAdminStmt->close();

    // Prepare and bind parameters for user insertion
    $stmt = $con->prepare("INSERT INTO users (`f_name`, `l_name`, `email`, `passwd`, `role_id`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $first_name, $last_name, $email, $hash, $role_id);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../AJMS/index.php");
        exit();
    } else {
        echo "User not registered, something went wrong: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>

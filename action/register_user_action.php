<?php
include "../settings/connection.php"; 

if (isset($_POST['submit'])) { 

    // Sanitize inputs
    $first_name = mysqli_real_escape_string($con, $_POST["firstName"]);
    $last_name = mysqli_real_escape_string($con, $_POST["lastName"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $pass_1 = $_POST["password"];
    $pass_2 = $_POST["confirmPassword"];    
    $hash = password_hash($pass_2, PASSWORD_DEFAULT); 

    // Check if passwords match
    if ($pass_1 !== $pass_2) {
        die("Passwords do not match.");
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
    $stmt = $con->prepare("INSERT INTO users (`f_name`, `l_name`, `email`, `passwd`, `role_id`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $first_name, $last_name, $email, $hash, $role_id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect based on role_id
        if ($role_id == 1) {
            header("Location: ../login/login_admin.php");
            exit(); 
        } else if ($role_id == 2) {
            header("Location: ../login/login_student.php");
            exit(); 
        }
    } else {
        echo "User not registered, something's wrong.";
        die("Error: " . $con->error);
    }

    $stmt->close();
    $con->close();
}
?>

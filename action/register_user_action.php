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

    // Prepare and bind parameters
    $stmt = $con->prepare("INSERT INTO users (`f_name`, `l_name`, `email`, `passwd`, `role_id`) VALUES (?, ?, ?, ?, ?)");
    $role_id = 1; // Default role ID
    $stmt->bind_param("ssssi", $first_name, $last_name, $email, $hash, $role_id);

    // Execute the statement
    if ($stmt->execute()) {
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

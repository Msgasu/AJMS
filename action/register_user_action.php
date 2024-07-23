<?php
include "../settings/connection.php";

if (isset($_POST['submit'])) { 

    // Sanitize inputs
    $first_name = mysqli_real_escape_string($mysqli, $_POST["firstName"]);
    $last_name = mysqli_real_escape_string($mysqli, $_POST["lastName"]);
    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $pass_1 = $_POST["password"];
    $pass_2 = $_POST["confirmPassword"];    
    $hash = password_hash($pass_2, PASSWORD_DEFAULT); 

    // Prepare and bind parameters
    $stmt = $mysqli->prepare("INSERT INTO users (`f_name`, `l_name`, `email`, `passwd`,`role_id`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone, $hash,1);

   
    if ($stmt->execute()) {
        header("Location:../login/login_admin.php");
        exit(); 
    } else {
        die("Error: ". $mysqli->error);
    }

    $stmt->close();
    $mysqli->close();
}
?>
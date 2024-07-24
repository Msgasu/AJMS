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
    $stmt = $mysqli->prepare("INSERT INTO users (`f_name`, `l_name`, `email`, `passwd`, `role_id`) VALUES (?, ?, ?, ?, ?)");
    $role_id = 2; // Default role ID
    $stmt->bind_param("ssssi", $first_name, $last_name, $email, $hash, $role_id);

   
    if ($stmt->execute()) {
        if ($role_id ==1 ){
            header("Location:../login/login_admin.php");
            exit(); 
        }
        else if($role_id == 2){
            header("Location:../login/login_student.php");
            exit(); 
        }
       
    } else {
        echo ("user not registered, somethings' wrong");
        die("Error: ". $mysqli->error);
    }

    $stmt->close();
    $mysqli->close();
}
?>
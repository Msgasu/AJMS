<?php
session_start();
include "../settings/connection.php"; 

$errors = array();

if (isset($_POST['submit'])) {
    // Retrieve inputs
    $username = $_POST["email"];
    $password = $_POST["password"];

    // Query to select user by email
    $query = "SELECT * FROM users WHERE email = ?";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $q_result = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $q_result["passwd"])) {
                $_SESSION["user_id"] = $q_result["pid"];
                $_SESSION["user_role"] = $q_result["role_id"];
                
                // Redirect based on user role
                if ($_SESSION["user_role"] == 1) {
                    header("Location: ../admin/admin_dashboard.php");
                } else {
                    header("Location: ../student/student_dashboard.php"); // Adjust as necessary
                }
                exit();
            } else {
                $_SESSION["error_message"] = "Incorrect password. Please try again.";
            }
        } else {
            $_SESSION["error_message"] = "User not found. Please register.";
        }
        
        $stmt->close();
    } else {
        $_SESSION["error_message"] = "Error: " . $con->error;
    }
}

// header("Location: ../login/login.php");
exit();
?>

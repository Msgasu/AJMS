<?php
session_start();
include "../settings/connection.php"; 

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
                $_SESSION["first_login"] = $q_result["first_login"];
                $_SESSION["email"] = $q_result["email"];
                $participant_role = $q_result["participant"];
                $_SESSION["participant"] = $participant_role;

                // Check if it's the first login and user is a student
                if ($q_result["first_login"] && $_SESSION["user_role"] == 2) {
                    // Mark the user as not new
                    $updateStmt = $con->prepare("UPDATE users SET first_login = FALSE WHERE email = ?");
                    $updateStmt->bind_param("s", $username);
                    $updateStmt->execute();
                    $updateStmt->close();
                    
                    // Redirect to welcome page for students on first login
                    header("Location: ../student/welcome_student_page.php"); 
                    exit();
                } else {
                    // Redirect based on user role
                    if ($_SESSION["user_role"] == 1) {
                        header("Location: ../admin/admin_dashboard.php");
                    } else if ($_SESSION["user_role"] == 2) {
                        if ($participant_role == 'victim') {
                            header("Location: ../student/student_dashboard.php");
                        } else {
                            header("Location: ../student/statement_submission.php");
                        }
                    } else {
                        // Handle other roles if needed
                        header("Location: ../student/statement_submission.php");
                    }
                    exit();
                }
            } else {
                $_SESSION["error_message"] = "Incorrect password. Please try again.";
                header("Location: ../login/alert.php");
                exit();
            }
        } else {
            $_SESSION["error_message"] = "User not found. Please register.";
            header("Location: ../login/alert.php");
            exit();
        }

        $stmt->close();
    } else {
        $_SESSION["error_message"] = "Error: " . $con->error;
        header("Location: ../login/alert.php");
        exit();
    }
}
?>

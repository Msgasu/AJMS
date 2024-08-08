<?php
session_start();
include "../settings/connection.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $role = mysqli_real_escape_string($con, $_POST["role"]);
    $student_id = mysqli_real_escape_string($con, $_POST["studentId"]);

    // Get user ID from session
    $user_id = $_SESSION['user_id'];

    // Prepare and execute the SQL statement to update the user
    $stmt = $con->prepare("UPDATE users SET student_id = ?, participant = ? WHERE pid = ?");
    $stmt->bind_param("sss", $student_id, $role, $user_id);

    if ($stmt->execute()) {
        // Retrieve the updated role to determine redirection
        $checkRoleStmt = $con->prepare("SELECT participant FROM users WHERE pid = ?");
        $checkRoleStmt->bind_param("s", $user_id);
        $checkRoleStmt->execute();
        $checkRoleStmt->bind_result($updated_role);
        $checkRoleStmt->fetch();
        $checkRoleStmt->close();

        // Debugging: Check the retrieved role
        error_log("Updated role: " . $updated_role);

        
            header("Location: ../student/statement_submission.php");
    
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>

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
        // Redirect based on participant role
        $participant_role = $_SESSION["participant"];
        if ($participant_role == 'victim') {
            header("Location: ../student/student_dashboard.php");
        } else {
            header("Location: ../student/statement_submission.php");
        }
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>

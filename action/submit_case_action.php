<?php
session_start();
include "../settings/connection.php"; // Ensure the path is correct

if (isset($_POST['submit'])) {
    // Sanitize and retrieve inputs
    $description = mysqli_real_escape_string($con, $_POST["report"]);
    $document_url = mysqli_real_escape_string($con, $_POST["documentUrl"]);
    $video_url = mysqli_real_escape_string($con, $_POST["videoUrl"]);
    $user_id = $_SESSION["user_id"]; // Get the user_id from session

    // Prepare and bind parameters
    $stmt = $con->prepare("INSERT INTO statements (user_id, statement_description, document_url, video_url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $description, $document_url, $video_url);

    // Execute and check
    if ($stmt->execute()) {
        // Redirect or provide success feedback
        header("Location: ../admin/admin_dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>

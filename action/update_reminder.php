<?php
include '../settings/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $reminder_date = $_POST['reminder_date'];
    $reminder_time = $_POST['reminder_time'];
    $message = $_POST['message'];

    $sql = "UPDATE reminders SET reminder_date = ?, reminder_time = ?, message = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssi", $reminder_date, $reminder_time, $message, $id);
    
    if ($stmt->execute()) {
        // Redirect with success message
        header("Location: ../admin/admin_dashboard.php?success=1");
        exit();
    } else {
        // Redirect with error message
        header("Location: ../../admin/admin_dashboard.php?error=" . urlencode($con->error));
    }

    $stmt->close();
    $con->close();
}
?>

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
        echo "Reminder updated successfully!";
        // Optionally redirect back or show a success message
    } else {
        echo "Error updating reminder: " . $con->error;
    }

    $stmt->close();
    $con->close();
}
?>

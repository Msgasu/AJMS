<?php
include '../settings/connection.php';
session_start();
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $user_id = $_SESSION["user_id"];
    $reminder_date = $_POST['reminder_date'];
    $reminder_time = $_POST['reminder_time'];
    $message = $_POST['message'];

    // Insert data into reminders table
    $sql = "INSERT INTO reminders (user_id, reminder_date, reminder_time, message) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param('isss', $user_id, $reminder_date, $reminder_time, $message);
        
        if ($stmt->execute()) {
            header("Location: ../admin/admin_dashboard.php");
        } else {
            echo "Error creating reminder: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $con->error;
    }
}

$con->close();
?>

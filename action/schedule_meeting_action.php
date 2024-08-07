<?php
include '../settings/connection.php';
include '../admin/schedule_meeting.php';

$date = $_POST['appointmentDate'];
$time = $_POST['appointmentTime'];
$location = $_POST['appointmentLoc'];
$userId = 1; // Replace this with the actual user ID who is scheduling the meeting


$stmt = $conn->prepare("INSERT INTO meetings (title, user_id, date, time, location) VALUES (?, ?, ?, ?, ?)");
$title = "Meeting"; 
$stmt->bind_param("sisss", $title, $userId, $date, $time, $location);

// Execute the statement
if ($stmt->execute()) {
    echo "New meeting scheduled successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$con->close();
?>
Key Points:

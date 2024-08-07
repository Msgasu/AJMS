<?php
include '../settings/connection.php';

$title = $_POST['title'];
$user_id = $_POST['user_id'];
$date = $_POST['date'];
$time = $_POST['time'];
$location = $_POST['location'];

$sql = "INSERT INTO meetings (title, user_id, date, time, location) VALUES ('$title', '$user_id', '$date', '$time', '$location')";

if ($conn->query($sql) === TRUE) {
    echo "Meeting scheduled successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>

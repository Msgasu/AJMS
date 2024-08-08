<?php
include '../settings/connection.php';
include '../settings/core.php';

$user_id = $_SESSION['user_id'];

// Fetch user data
$sql = "SELECT f_name, l_name, email FROM users WHERE pid = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($f_name, $l_name, $email);
$stmt->fetch();
$stmt->close();
$con->close();
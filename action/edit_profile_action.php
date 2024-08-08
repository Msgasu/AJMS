<?php
session_start();
include '../settings/connection.php';
include '../settings/core.php';

// Ensure the user is logged in
login();

// Fetch user data
$user_id = $_SESSION['user_id'];
$sql = "SELECT f_name, l_name, email FROM users WHERE pid = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Prepare failed: ' . $con->error);
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($f_name, $l_name, $email);
$stmt->fetch();
$stmt->close();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_f_name = $_POST['f_name'];
    $new_l_name = $_POST['l_name'];
    $new_email = $_POST['email'];

    // Update user data
    $update_sql = "UPDATE users SET f_name = ?, l_name = ?, email = ? WHERE pid = ?";
    $update_stmt = $conn->prepare($update_sql);

    if ($update_stmt === false) {
        die('Prepare failed: ' . $con->error);
    }

    $update_stmt->bind_param("sssi", $new_f_name, $new_l_name, $new_email, $user_id);
    $update_stmt->execute();
    $update_stmt->close();

    // Redirect to profile page after update
    header('Location: profile.php');
    exit();
}

$con->close();
?>
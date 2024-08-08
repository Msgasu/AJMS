<?php
// Include core settings and database connection
include '../settings/core.php';
include '../settings/connection.php';

// Fetch user details
$user_id = $_SESSION['user_id']; // Assuming user_id is stored in session after login

// Query to get participant role
$sql = "SELECT participant FROM users WHERE pid = ?";
$stmt = $con->prepare($sql);
if (!$stmt) {
    die('Prepare failed: ' . $con->error);
}

$stmt->bind_param('i', $user_id);
$stmt->execute();
if ($stmt->error) {
    die('Execute failed: ' . $stmt->error);
}

$result = $stmt->get_result();
$user = $result->fetch_assoc();
$participant_role = $user['participant'];

// Store participant role in session
$_SESSION['participant_role'] = $participant_role;

$stmt->close();
?>

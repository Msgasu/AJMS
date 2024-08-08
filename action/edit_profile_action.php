<?php
include '../settings/connection.php';
include '../settings/core.php';

// Ensure the user is logged in
login();

//$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $new_f_name = $_POST['f_name'];
    $new_l_name = $_POST['l_name'];
    $new_email = $_POST['email'];

    // Update user data
    $update_sql = "UPDATE users SET f_name = ?, l_name = ?, email = ? WHERE pid = ?";
    $update_stmt = $con->prepare($update_sql);

    if ($update_stmt === false) {
        die('Prepare failed: ' . $con->error);
    }

    $update_stmt->bind_param("sssi", $new_f_name, $new_l_name, $new_email, $user_id);
    $update_stmt->execute();
    $update_stmt->close();

    $_SESSION['user_full_name'] = $new_f_name . ' ' . $new_l_name;
    $_SESSION['user_email'] = $new_email;

    $response['success'] = true;
    $response['full_name'] = $new_f_name . ' ' . $new_l_name;
    $response['email'] = $new_email;
}

$con->close();

//echo json_encode($response);
?>

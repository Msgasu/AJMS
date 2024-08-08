<?php

include '../settings/connection.php';
session_start(); // Start session if using sessions to manage logged-in users

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['emails']) ){


  
    $user_id = $_SESSION["user_id"];

    // Query to get the case ID based on the logged-in user
    $case_query = $con->prepare("SELECT id FROM cases WHERE user_id = ? ORDER BY created_at DESC LIMIT 1");
    /* This code snippet is checking if the preparation of the database query `` was
    successful or not. If the preparation fails, it outputs an error message in JSON format
    indicating a database prepare error along with the specific error message obtained from
    `->error`. After that, it exits the script to prevent further execution since the query
    preparation failed. This is a common practice to handle database errors during query preparation
    in PHP scripts. */
    // if (!$case_query) {
    //     echo json_encode(['status' => 'error', 'message' => 'Database prepare error: ' . $con->error]);
    //     exit;
    // }

    $case_query->bind_param("i", $user_id);
    $case_query->execute();
    $case_query->bind_result($case_id);

    if (!$case_query->fetch()) {
        echo json_encode(['status' => 'error', 'message' => 'No case found for this user']);
        $case_query->close();
        $con->close();
        exit;
    }
    $case_query->close();

    // Check if emails are provided
    if (!isset($_POST['emails'])) {
        echo json_encode(['status' => 'error', 'message' => 'No emails data received']);
        $con->close();
        exit;
    }

    // Get emails from POST request
    $emails = json_decode($_POST['emails'], true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email data: ' . json_last_error_msg()]);
        $con->close();
        exit;
    }

    // Prepare SQL statement for insertion
    $stmt = $con->prepare("INSERT INTO case_parties (case_id, student_email) VALUES (?, ?)");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Database prepare error: ' . $con->error]);
        $con->close();
        exit;
    }

    // Iterate over the emails and insert them into the database
    foreach ($emails as $email) {
        $stmt->bind_param("is", $case_id, $email);
        if (!$stmt->execute()) {
            echo "well dang!";
            echo json_encode(['status' => 'error', 'message' => 'Insert error: ' . $stmt->error]);
            $stmt->close();
            $con->close();
            exit;
        }
    }
    
    // Close statement and connection
    $stmt->close();
    $con->close();

    // Return a response
    echo json_encode(['status' => 'success']);

}
?>

<?php

include "../settings/connection.php";

// Start the session
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $statement_description = $_POST['report'];

    // Get user ID from the session
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        die('User not logged in.');
    }

    // Handle file upload
    $document_url = null;
    $video_url = null;

    if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
        $document = $_FILES['document'];
        $documentName = basename($document['name']);
        $targetDir = '../assets/';
        $targetFile = $targetDir . $documentName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($document['tmp_name'], $targetFile)) {
            $document_url = $targetFile; // Store the path in the database
        } else {
            die('Document upload failed.');
        }
    }

    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $video = $_FILES['video'];
        $videoName = basename($video['name']);
        $targetDir = '../assets/';
        $targetFile = $targetDir . $videoName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($video['tmp_name'], $targetFile)) {
            $video_url = $targetFile; // Store the path in the database
        } else {
            die('Video upload failed.');
        }
    }

    // Prepare and execute SQL query using MySQLi
    $stmt = $con->prepare('INSERT INTO statements (user_id, statement_description, document_url, video_url) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('isss', $user_id, $statement_description, $document_url, $video_url);

    if ($stmt->execute()) {
        echo 'Report submitted successfully!';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>

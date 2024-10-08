<?php
include "../settings/connection.php";

// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $statement_description = $_POST['report'];

    // Get user ID from the session
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        die('User not logged in.');
    }

    // Initialize document URL
    $document_url = null;
    $targetDir = '../assets/';

    // Handle document upload
    if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
        $document = $_FILES['document'];
        $documentName = basename($document['name']);
        $targetFile = $targetDir . $documentName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($document['tmp_name'], $targetFile)) {
            $document_url = $targetFile; // Store the path in the database
        } else {
            die('Document upload failed.');
        }
    }

    // Handle video upload (if applicable)
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $video = $_FILES['video'];
        $videoName = basename($video['name']);
        $targetFile = $targetDir . $videoName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($video['tmp_name'], $targetFile)) {
            $document_url = $targetFile; // Store the path in the document_url column
        } else {
            die('Video upload failed.');
        }
    }

    // Prepare and execute SQL query using MySQLi
    $stmt = $con->prepare('INSERT INTO cases (user_id, statement_description, document_url, status_id) VALUES (?, ?, ?, ?)');
    $status_id = 1; // Default status ID for 'pending'
    $stmt->bind_param('issi', $user_id, $statement_description, $document_url, $status_id);

    if ($stmt->execute()) {
        $case_id = $stmt->insert_id;

        // Store the case ID in a session variable
        $_SESSION['case_id'] = $case_id;

        header("Location: ../student/student_dashboard.php");
        exit();
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $con->close();
} else {
    echo 'Invalid request method.';
}
?>

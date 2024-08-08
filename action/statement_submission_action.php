<?php
include "../settings/connection.php";

// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $statement_description = $_POST['report'];

    // Get user ID and email from the session
    if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
        $user_id = $_SESSION['user_id'];
        $user_email = $_SESSION['email'];
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

    // Retrieve the case ID based on the user's email
    $case_stmt = $con->prepare('SELECT case_id FROM case_parties WHERE student_email = ?');
    $case_stmt->bind_param('s', $user_email);
    $case_stmt->execute();
    $case_result = $case_stmt->get_result();

    if ($case_result->num_rows > 0) {
        $case_row = $case_result->fetch_assoc();
        $case_id = $case_row['case_id'];
    } else {
        // If not found in case_parties, check the cases table
        $case_stmt = $con->prepare('SELECT id FROM cases WHERE user_id = ?');
        $case_stmt->bind_param('i', $user_id);
        $case_stmt->execute();
        $case_result = $case_stmt->get_result();

        if ($case_result->num_rows > 0) {
            $case_row = $case_result->fetch_assoc();
            $case_id = $case_row['id'];
        } else {
            die('No case found for the user.');
        }
    }

    // Prepare and execute SQL query using MySQLi
    $stmt = $con->prepare('INSERT INTO statements (case_id, user_id, statement_description, document_url) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('iiss', $case_id, $user_id, $statement_description, $document_url);

    if ($stmt->execute()) {
        $statement_id = $stmt->insert_id;

        // Store the statement ID in a session variable
        $_SESSION['statement_id'] = $statement_id;
        $participant_role=  $_SESSION["participant"];
        if ($participant_role == 'victim') {
            header("Location: ../student/student_dashboard.php");
        } else {
            header("Location: ../student/statement_submission.php");
        }
        exit();
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $case_stmt->close();
    $con->close();
} else {
    echo 'Invalid request method.';
}
?>

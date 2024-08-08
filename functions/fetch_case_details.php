<?php
// Include core settings and database connection
include '../settings/core.php';
include '../settings/connection.php';

// Define the user ID you want to pass


// Function to fetch and display case details
function fetchAndDisplayCaseDetails($user_id, $con) {
    // Query to get cases for the logged-in user
    $sql = "SELECT c.id, c.statement_description, c.document_url, u.email AS student_email
            FROM cases c
            JOIN users u ON c.user_id = u.pid
            WHERE c.user_id = ?";
    
    // Prepare the statement
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        die('Prepare failed: ' . $con->error);
    }
    
    // Bind parameters and execute
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    if ($stmt->error) {
        die('Execute failed: ' . $stmt->error);
    }
    
    // Get results
    $result = $stmt->get_result();
    if (!$result) {
        die('Get result failed: ' . $stmt->error);
    }
    
    // Fetch all cases
    $cases = $result->fetch_all(MYSQLI_ASSOC);
    
    // // Debug: output fetched cases
    // echo '<pre>';
    // echo 'Fetched cases: ';
    // print_r($cases);
    // echo '</pre>';
    
    $stmt->close();
    
    // Output the HTML directly
    echo '<div class="row">';
    foreach ($cases as $case) {
        echo '<div class="col-md-4">';
        echo '    <div class="card mb-4 shadow-sm card-custom">';
        echo '        <div class="case-card-header" style="background-image: url(\'../images/Ashesi.jpg\');">';
        echo '        </div>';
        echo '        <div class="case-card-body">';
        echo '            <h5 class="card-title">Case ID: ' . htmlspecialchars($case['id']) . '</h5>';
        echo '            <p>Description: ' . htmlspecialchars($case['statement_description']) . '</p>';
        echo '            <p>Document: <a href="' . htmlspecialchars($case['document_url']) . '" target="_blank">View Document</a></p>';
        echo '            <p>Email: ' . htmlspecialchars($case['student_email']) . '</p>';
        echo '            <button class="btn btn-success" onclick="location.href=\'View_progress.php\'">View Progress</button>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
    echo '</div>';
}

// Call the function with the user ID and connection
// fetchAndDisplayCaseDetails($user_id, $con);
?>

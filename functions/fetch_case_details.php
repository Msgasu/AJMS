<?php
// Include core settings and database connection
include '../settings/core.php';
include '../settings/connection.php';

function fetchAndDisplayCaseDetails($user_id, $con) {
    // Query to get cases for the logged-in user without aliases
    $sql = "SELECT cases.id, cases.statement_description, cases.document_url, users.email
            FROM cases
            JOIN case_parties ON cases.id = case_parties.case_id
            JOIN users ON case_parties.student_email = users.email
            WHERE cases.user_id = ?";

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
    
    // Debug: output fetched cases
    echo '<pre>';
    echo 'Fetched cases: ';
    print_r($cases);
    echo '</pre>';
    
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
        echo '            <p>Email: ' . htmlspecialchars($case['email']) . '</p>';
        echo '            <button class="btn btn-success" onclick="location.href=\'book_meeting.php\'">Book</button>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
    echo '</div>';
}
?>

<?php
function fetchAndDisplayStatements($case_id) {
    // Include your database connection
    include "../settings/connection.php"; // Update with the correct path to your connection file

    // Validate and sanitize input
    $case_id = intval($case_id);

    // Prepare the SQL query to fetch statements along with user participant information
    $query = "
        SELECT s.id AS statement_id, s.statement_description, s.document_url, s.created_at AS submission_date, 
               u.participant ,CONCAT(u.f_name, ' ', u.l_name) AS full_name
        FROM statements s
        JOIN users u ON s.user_id = u.pid
        WHERE s.case_id = ?
    ";

    // Prepare and execute the statement
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $case_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $statements = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    // Close the database connection
    $con->close();

    // Echo the HTML part for displaying statements
    echo '<div class="container mt-4">';
    echo '    <a href="#" class="back-button mb-3">&larr; back</a>';
    echo '    <h2>CASE: ' . htmlspecialchars($case_id) . '</h2>'; // Replace with the actual case name if available
    echo '    <h5><em>Find below the statements of the involved parties.</em></h5>';
    echo '    <div class="row">';

    foreach ($statements as $statement) {
        echo '        <div class="col-md-4 mb-4">';
        echo '            <div class="card mb-4 shadow-sm">';
        echo '                <div class="card-header" style="background-image: url(\'../images/Ashesi.jpg\'); background-size: cover; background-position: center; height: 150px;">';
        echo '                </div>';
        echo '                <div class="card-body">';
        echo '                    <h5 class="card-title">'. htmlspecialchars($statement['participant']) .' : '. htmlspecialchars($statement['full_name']). '</h5>';
        echo '                    <p>Date Submitted: ' . htmlspecialchars($statement['submission_date']) . '</p>';
        echo '                    <p>Description: ' . htmlspecialchars($statement['statement_description']) . '</p>';
        if ($statement['document_url']) {
            echo '                    <p>Document: <a href="' . htmlspecialchars($statement['document_url']) . '" target="_blank">View Document</a></p>';
        } else {
            echo '                    <p>No document available.</p>';
        }
        // echo '                    <button class="btn btn-success">View Progress</button>';
        echo '                </div>';
        echo '            </div>';
        echo '        </div>';
    }

    echo '    </div>';
    echo '</div>';
}
?>

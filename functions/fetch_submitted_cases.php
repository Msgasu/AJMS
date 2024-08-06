<?php
include "../settings/connection.php";

function fetchSubmittedCases($con) {
    // Define the query with the correct column names
    $query = 'SELECT s.id, s.statement_description, s.document_url, s.created_at, 
                     CONCAT(u.f_name, " ", u.l_name) AS user_name
              FROM statements s
              JOIN users u ON s.user_id = u.pid
              ORDER BY s.created_at DESC';
    
    // Execute the query
    $result = $con->query($query);
    
    // Check if there are results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $case_id = htmlspecialchars($row['id']);
            $description = htmlspecialchars($row['statement_description']);
            $document_url = htmlspecialchars($row['document_url']);
            $created_at = htmlspecialchars($row['created_at']);
            $user_name = htmlspecialchars($row['user_name']);
    
            echo '<div class="case-widget">';
            echo '<h5>Case #' . $case_id . '</h5>';
            echo '<p class="case-description">' . $description . '</p>';
            echo '<div class="case-meta">';
            echo '<span>Date: ' . $created_at . '</span>';
            echo '<span>User: ' . $user_name . '</span>';
            echo '</div>';
            echo '<div class="status-buttons">';
            echo '<button class="status-button submitted">Submitted</button>';
            echo '<button class="status-button reviewed">Reviewed</button>';
            echo '<button class="status-button dean">Dean</button>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No cases submitted yet.</p>';
    }
}

// Call the function
// fetchSubmittedCases($con);


?>

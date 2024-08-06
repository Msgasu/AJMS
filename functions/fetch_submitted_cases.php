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

            // Add Read More functionality
            $short_description = substr($description, 0, 100); // Show first 100 chars
            $full_description = $description;
            $is_long_text = strlen($description) > 100;

            echo '<div class="case-widget">';
            echo '<h5>Case #' . $case_id . '</h5>';
            echo '<p class="case-description">';
            echo $short_description;
            if ($is_long_text) {
                echo '<span class="more-text" style="display: none;">' . $full_description . '</span>';
                echo '<a href="#" class="read-more" onclick="toggleText(this); return false;">Read More</a>';
            }
            echo '</p>';
            
            // Display the document (image or video)
            if ($document_url) {
                $file_ext = pathinfo($document_url, PATHINFO_EXTENSION);
                if (in_array($file_ext, ['jpg', 'jpeg', 'png'])) {
                    echo '<img src="' . $document_url . '" alt="Uploaded Document" class="document-preview">';
                } elseif (in_array($file_ext, ['mp4', 'mov'])) {
                    echo '<video controls class="document-preview"><source src="' . $document_url . '" type="video/' . $file_ext . '">Your browser does not support the video tag.</video>';
                }
            }
            
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

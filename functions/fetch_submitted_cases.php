<?php
include "../settings/connection.php";

function fetchSubmittedCases($con) {
    $query = 'SELECT s.id AS statement_id, s.statement_description, s.document_url, s.created_at, 
                     CONCAT(u.f_name, " ", u.l_name) AS user_name, 
                     s.status_id, st.status_name
              FROM statements s
              JOIN users u ON s.user_id = u.pid
              JOIN status st ON s.status_id = st.status_id
              ORDER BY s.created_at DESC';
    
    $result = $con->query($query);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $statement_id = htmlspecialchars($row['statement_id']);
            $description = htmlspecialchars($row['statement_description']);
            $document_url = htmlspecialchars($row['document_url']);
            $created_at = htmlspecialchars($row['created_at']);
            $user_name = htmlspecialchars($row['user_name']);
            $status_id = htmlspecialchars($row['status_id']);
            $status_name = htmlspecialchars($row['status_name']);

            $short_description = substr($description, 0, 100); // Show first 100 chars
            $full_description = $description;
            $is_long_text = strlen($description) > 100;
            $document_preview = '';

            if (preg_match('/\.(jpeg|jpg|png)$/i', $document_url)) {
                $document_preview = '<img src="' . $document_url . '" alt="Attached File" class="document-preview">';
            } elseif (preg_match('/\.(mp4|avi|mov)$/i', $document_url)) {
                $document_preview = '<video controls class="document-preview"><source src="' . $document_url . '" type="video/mp4">Your browser does not support the video tag.</video>';
            } else {
                $document_preview = '<p>No files submitted</p>';
            }

            $status_options = '';
            $status_query = 'SELECT * FROM status';
            $status_result = $con->query($status_query);
            if ($status_result->num_rows > 0) {
                while ($status_row = $status_result->fetch_assoc()) {
                    $option_id = htmlspecialchars($status_row['status_id']);
                    $option_name = htmlspecialchars($status_row['status_name']);
                    $selected = ($option_id == $status_id) ? 'selected' : '';
                    $status_options .= '<option value="' . $option_id . '" ' . $selected . '>' . $option_name . '</option>';
                }
            }

            echo '<tr>';
            echo '<td>' . $statement_id . '</td>';
            echo '<td>' . $created_at . '</td>';
            echo '<td>';
            echo $short_description;
            if ($is_long_text) {
                echo '<span class="more-text" style="display: none;">' . $full_description . '</span>';
                echo '<a href="#" class="read-more" onclick="toggleText(this); return false;">Read More</a>';
            }
            echo '</td>';
            echo '<td>';
            echo '<div class="document-container" id="doc-' . $statement_id . '" style="display: none;">' . $document_preview . '</div>';
            echo '<button onclick="toggleDocument(' . $statement_id . ');" class="btn btn-primary">View Attached</button>';
            echo '<button onclick="toggleDocument(' . $statement_id . ');" class="btn btn-secondary" style="display: none;">Hide Attached</button>';
            echo '</td>';
            echo '<td>';
            echo '<select name="status" onchange="updateStatus(this, ' . $statement_id . ');">';
            echo $status_options;
            echo '</select>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="5">No cases submitted yet.</td></tr>';
    }
}
?>

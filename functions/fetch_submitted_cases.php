<?php
include "../settings/connection.php";

function fetchSubmittedCases($con) {
    // Define the query with the correct column names
    $query = 'SELECT s.id, s.statement_description, s.document_url, s.created_at, 
                     CONCAT(u.f_name, " ", u.l_name) AS user_name, 
                     s.status_id, st.status_name
              FROM statements s
              JOIN users u ON s.user_id = u.pid
              JOIN status st ON s.status_id = st.status_id
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
            $status_id = htmlspecialchars($row['status_id']);
            $status_name = htmlspecialchars($row['status_name']);

            // Prepare case description and attachments
            $short_description = substr($description, 0, 100); // Show first 100 chars
            $full_description = $description;
            $is_long_text = strlen($description) > 100;
            $document_preview = '';

            // Determine file type and generate preview
            if (preg_match('/\.(jpeg|jpg|png)$/i', $document_url)) {
                $document_preview = '<img src="' . $document_url . '" alt="Attached File" class="document-preview">';
            } elseif (preg_match('/\.(mp4|avi|mov)$/i', $document_url)) {
                $document_preview = '<video controls class="document-preview"><source src="' . $document_url . '" type="video/mp4">Your browser does not support the video tag.</video>';
            } else {
                $document_preview = '<p>No files submitted</p>';
            }

            // Prepare status dropdown
            $status_options = '';
            $status_query = 'SELECT * FROM status'; // Assuming the status table has all statuses
            $status_result = $con->query($status_query);
            if ($status_result->num_rows > 0) {
                while ($status_row = $status_result->fetch_assoc()) {
                    $option_id = htmlspecialchars($status_row['status_id']);
                    $option_name = htmlspecialchars($status_row['status_name']);
                    $selected = ($option_id == $status_id) ? 'selected' : '';
                    $status_options .= '<option value="' . $option_id . '" ' . $selected . '>' . $option_name . '</option>';
                }
            }

            // Output case as table row
            echo '<tr>';
            echo '<td>' . $case_id . '</td>';
            echo '<td>' . $created_at . '</td>';
            echo '<td>';
            echo $short_description;
            if ($is_long_text) {
                echo '<span class="more-text" style="display: none;">' . $full_description . '</span>';
                echo '<a href="#" class="read-more" onclick="toggleText(this); return false;">Read More</a>';
            }
            echo '</td>';
            echo '<td>' . $document_preview . '</td>';
            echo '<td>';
            echo '<select name="status" onchange="updateStatus(this, ' . $case_id . ');">';
            echo $status_options;
            echo '</select>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="5">No cases submitted yet.</td></tr>';
    }
}

// Call the function
// fetchSubmittedCases($con);
?>


<script>
function updateStatus(selectElement, caseId) {
    var statusId = selectElement.value;
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../settings/update_status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("case_id=" + caseId + "&status_id=" + statusId);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert("Status updated successfully.");
        } else {
            alert("Failed to update status.");
        }
    };
}
</script>

<?php
function fetchReminders() {
    include '../settings/connection.php';
    
    $sql = "SELECT * FROM reminders ORDER BY reminder_date DESC";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = htmlspecialchars($row['id']);
            $user_id = htmlspecialchars($row['user_id']);
            $reminder_date = htmlspecialchars($row['reminder_date']);
            $reminder_time = htmlspecialchars($row['reminder_time']);
            $message = htmlspecialchars($row['message']);
            $created_at = htmlspecialchars($row['created_at']); // Assuming you have a 'created_at' column
            
            // Trim message if too long
            $maxLength = 100;
            $shortMessage = (strlen($message) > $maxLength) ? substr($message, 0, $maxLength) . '...' : $message;

            // Output reminder card with icons
            echo '
            <br>
            <div class="card mb-3 shadow-sm rounded" style="max-width: 400px; height: auto; overflow: hidden; position: relative;">
                <div class="card-body" style="padding: 1rem;">
                    <h6 class="card-subtitle mb-2 text-muted" style="font-size: 0.875rem;">Date: ' . $reminder_date . ' at ' . $reminder_time . '</h6>
                    <p class="card-text" style="font-size: 0.875rem;">
                        ' . $shortMessage . '
                        ' . (strlen($message) > $maxLength ? '<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal' . $id . '">Read More</a>' : '') . '
                    </p>
                    <small class="text-muted" style="font-size: 0.75rem;">Date Created: ' . $created_at . '</small>
                    
                    <!-- Buttons in bottom-right corner -->
                    <div class="card-buttons">
                        <button class="btn btn-edit" data-toggle="modal" data-target="#updateModal' . $id . '"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-delete" data-toggle="modal" data-target="#deleteConfirmationModal' . $id . '"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>';

            
            // Delete Confirmation Modal
            echo '
            <div class="modal fade" id="deleteConfirmationModal' . $id . '" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel' . $id . '" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmationModalLabel' . $id . '">Confirm Deletion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this reminder?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success" data-id="' . $id . '" onclick="confirmDelete(this)">Delete</button>
                        </div>
                    </div>
                </div>
            </div>';
        }

    } else {
        echo '<p>No reminders found.</p>';
    }
    
    $con->close();
}
?>

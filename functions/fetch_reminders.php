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
            <div class="card mb-3 shadow-sm rounded" style="max-width: 400px; height: auto; overflow: hidden;">
                <div class="card-body" style="padding: 1rem;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#updateModal' . $id . '"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger" onclick="deleteReminder(' . $id . ')"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-muted" style="font-size: 0.875rem;">Date: ' . $reminder_date . ' at ' . $reminder_time . '</h6>
                    <p class="card-text" style="font-size: 0.875rem;">
                        ' . $shortMessage . '
                        ' . (strlen($message) > $maxLength ? '<a href="#" class="btn btn-primary btn-sm">Read More</a>' : '') . '
                    </p>
                    <small class="text-muted" style="font-size: 0.75rem;">Date Created: ' . $created_at . '</small>
                </div>
            </div>';
            
            // // Update Modal
            // echo '
            // <div class="modal fade" id="updateModal' . $id . '" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel' . $id . '" aria-hidden="true">
            //     <div class="modal-dialog" role="document">
            //         <div class="modal-content">
            //             <div class="modal-header">
            //                 <h5 class="modal-title" id="updateModalLabel' . $id . '">Update Reminder</h5>
            //                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            //                     <span aria-hidden="true">&times;</span>
            //                 </button>
            //             </div>
            //             <div class="modal-body">
            //                 <form method="POST" action="../action/update_reminder_action.php">
            //                     <input type="hidden" name="id" value="' . $id . '">
            //                     <div class="form-group">
            //                         <label for="updateDate' . $id . '">Date</label>
            //                         <input type="date" class="form-control" id="updateDate' . $id . '" name="reminder_date" value="' . $reminder_date . '" required>
            //                     </div>
            //                     <div class="form-group">
            //                         <label for="updateTime' . $id . '">Time</label>
            //                         <input type="time" class="form-control" id="updateTime' . $id . '" name="reminder_time" value="' . $reminder_time . '" required>
            //                     </div>
            //                     <div class="form-group">
            //                         <label for="updateMessage' . $id . '">Message</label>
            //                         <textarea class="form-control" id="updateMessage' . $id . '" name="message" rows="3" required>' . $message . '</textarea>
            //                     </div>
            //                     <button type="submit" class="btn btn-primary">Update Reminder</button>
            //                 </form>
            //             </div>
            //             <div class="modal-footer">
            //                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            //             </div>
            //         </div>
            //     </div>
            // </div>';
        }
    } else {
        echo '<p>No reminders found.</p>';
    }
    
    $con->close();
}
?>

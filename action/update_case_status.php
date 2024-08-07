<?php
include "../settings/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize the statement_id and status_id from POST data
    $statement_id = filter_input(INPUT_POST, 'statement_id', FILTER_SANITIZE_NUMBER_INT);
    $status_id = filter_input(INPUT_POST, 'status_id', FILTER_SANITIZE_NUMBER_INT);

    // Check if statement_id and status_id are set and valid
    if ($statement_id !== null && $status_id !== null && filter_var($statement_id, FILTER_VALIDATE_INT) && filter_var($status_id, FILTER_VALIDATE_INT)) {
        // Prepare and execute the update query
        $stmt = $con->prepare("UPDATE statements SET status_id = ? WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("ii", $status_id, $statement_id);

            if ($stmt->execute()) {
                echo "Status updated successfully.";
            } else {
                echo "Failed to update status: " . $con->error;
            }

            $stmt->close();
        } else {
            echo "Failed to prepare the statement: " . $con->error;
        }
    } else {
        echo "Invalid statement_id or status_id.";
    }
} else {
    echo "Invalid request method.";
}
?>

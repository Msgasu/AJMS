// delete_reminder.php
<?php
include '../settings/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM reminders WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Reminder deleted successfully!";
        // Optionally redirect back or show a success message
    } else {
        echo "Error deleting reminder: " . $con->error;
    }

    $stmt->close();
    $con->close();
}
?>

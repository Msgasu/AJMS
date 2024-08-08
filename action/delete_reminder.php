// delete_reminder.php
<?php
include '../settings/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM reminders WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Redirect with success message
        header("Location: ../admin/admin_dashboard.php?success=1");
        exit();
    } else {
        // Redirect with error message
        header("Location: ../../admin/admin_dashboard.php?error=" . urlencode($con->error));
    }

    $stmt->close();
    $con->close();
}
?>

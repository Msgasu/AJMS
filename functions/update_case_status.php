<?php
include '../config/database.php';

if (isset($_POST['case_id']) && isset($_POST['status'])) {
    $case_id = $_POST['case_id'];
    $status = $_POST['status'];

    $query = "UPDATE cases SET status = '$status' WHERE case_id = '$case_id'";
    if (mysqli_query($con, $query)) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }
}
?>

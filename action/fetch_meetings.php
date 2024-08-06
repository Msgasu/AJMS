<?php
include '../settings/connection';

$sql = "SELECT * FROM meetings";
$result = $con->query($sql);

$meetings = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $meetings[] = $row;
    }
}

echo json_encode($meetings);
?>

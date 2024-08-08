<?php
include "../settings/connection.php"; 
include_once "../settings/core.php"; 


function getUserName($userId, $con) {
    $query = "SELECT `f_name`, `l_name` FROM users WHERE `pid` = $userId";
    $result_name = mysqli_query($con, $query);
    if ($result_name && mysqli_num_rows($result_name) > 0) {
        $row = mysqli_fetch_assoc($result_name);
        return $row['f_name'] . ' ' . $row['l_name']; 
    } else {
        return "User not found";
    }
}

function getProfilePicture($userId, $con) {
    $query = "SELECT profile_picture FROM users WHERE pid = $userId";
    $result_picture = mysqli_query($con, $query);
    if ($result_picture && mysqli_num_rows($result_picture) > 0) {
        $row = mysqli_fetch_assoc($result_picture);
        return $row['profile_picture']; 
    } else {
        return "User not found";
    }
}




function getRole($userId, $con) {
    $query_r = "SELECT r.role_name FROM users p JOIN roles r ON p.role_id = r.rid WHERE p.pid = $userId";
    $result_role = mysqli_query($con, $query_r);
    if ($result_role && mysqli_num_rows($result_role) > 0) {
        $row = mysqli_fetch_assoc($result_role);
        return $row['role_name']; 
    } else {
        return "Role not found";
    }
}


?>
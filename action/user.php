<?php 
include '../settings/connection.php';
include '../settings/core.php';

function getUserById($pid, $db){
    $sql = "SELECT * FROM users WHERE pid = ?";
	$stmt = $db->prepare($sql);
	$stmt->execute([$pid]);
    
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();
        return $user;
    }else {
        return 0;
    }
}

 ?>
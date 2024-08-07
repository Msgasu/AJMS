<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['role_id']);

if ($_SESSION['role_id']== 1){
    header ("Location:login_admin.php");
}
else{
    header ("Location:login_student.php");
}

?>
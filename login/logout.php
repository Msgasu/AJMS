<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['role_id']);

    header ("Location: ../AJMS_MEGA/index.php");
    exit();

?>
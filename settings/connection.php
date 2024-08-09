<?php
// Define constants for database connection
if (!defined('HOST')) {
    define("HOST", "127.0.0.1");
}
if (!defined('DB_NAME')) {
    define("DB_NAME", "ajms");
}
if (!defined('USERNAME')) {
    define("USERNAME", "root");
}
if (!defined('PASSWORD')) {
    define("PASSWORD", "ZKtHRK=w/Nb8");
}

// Create connection using constants
$con = new mysqli(HOST, USERNAME, PASSWORD, DB_NAME);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>

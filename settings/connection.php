<?php
// Define constants for database connection
if (!defined('HOST')) {
    define("HOST", "localhost");
}
if (!defined('DB_NAME')) {
    define("DB_NAME", "ajms");
}
if (!defined('USERNAME')) {
    define("USERNAME", "root");
}
if (!defined('PASSWORD')) {
    define("PASSWORD", " ");
}

// Create connection using constants
$con = new mysqli(HOST, USERNAME, PASSWORD, DB_NAME);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>

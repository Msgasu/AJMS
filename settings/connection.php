<?php
// Check if constants are not defined before defining them
if (!defined('HOST')) {
    define("HOST", "localhost");
}
if (!defined('DB_NAME')) {
    define("DB_NAME", "AJMS");
}
if (!defined('USERNAME')) {
    define("USERNAME", "root");
}
if (!defined('PASSWORD')) {
    define("PASSWORD", "");
}

// secure
$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DB_NAME);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?> 
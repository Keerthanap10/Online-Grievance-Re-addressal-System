<?php
$host = 'localhost';
$username = '/*Your username*/';
$password = '/*Your password*/';
$database = 'wadprj'; //my database name
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

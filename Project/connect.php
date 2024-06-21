<?php
$host = 'localhost';
$username = 'wadprj';
$password = 'KeerthanaE@1009';
$database = 'wadprj';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
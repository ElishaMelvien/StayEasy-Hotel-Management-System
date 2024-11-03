<?php
$hostname = "localhost"; 
$username = "root";
$password = "";
$database = "book my stay";

$conn = new mysqli($hostname, $username, $password, $database);
 
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error, 3, 'error.log');
    die("Database connection error. Please try again later.");
}
?>

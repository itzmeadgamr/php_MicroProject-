<?php
$servername = "localhost";
$username = "root";     
$password = "";         
$database = "event_management"; 

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("❌ Database Connection Failed: " . $conn->connect_error);
}
?>

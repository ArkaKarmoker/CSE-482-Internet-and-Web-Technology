<?php
// db_connect.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_bookstore"; // Make sure you create this database in phpMyAdmin

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

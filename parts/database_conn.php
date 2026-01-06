<?php
// Database configuration
$servername = "localhost";  // XAMPP runs MySQL on localhost
$username = "root";         // default XAMPP username
$password = "";             // default XAMPP password is empty
$dbname = "wise_words";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";


<?php
// Database configuration
$host = "localhost";    // Hostname (usually 'localhost')
$username = "root";     // Database username
$password = "";         // Database password
$database = "test_19";  // Database Name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Successfully connected to the database.";

$conn->close();
?>

<?php

// Database configuration
//To run: type 'localhost/{filePath}' in browser
$host = "localhost";    // Hostname (usually 'localhost')
$username = "root";     // Database username
$password = "";         // Database password
$database = "srms_test";  // Database Name

// Create connection
$conn = new mysqli($host, $username, $password, $database);
#$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Successfully connected to the database.";

//TODO: Feth values from html
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_POST['username']) && isset($_POST['password'])) {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM login_test WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user record
        $user = $result->fetch_assoc();

        // Verify the provided password with the hashed password in the database
        if (password_verify($inputPassword, $user['password'])) {
            echo "Login successful! Welcome, " . htmlspecialchars($inputUsername) . ".";
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    // Close the statement
    $stmt->close();
}}

$conn->close();
?>

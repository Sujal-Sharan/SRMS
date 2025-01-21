<?php
    //Creates a database connection
    $host = "localhost";    // Hostname (usually 'localhost')
    $username = "root";     // Database username
    $password = "";         // Database password
    $database = "srms_test";  // Database Name

    // Create connection
    try{
        $conn = new mysqli($host, $username, $password, $database);
    }
    catch(mysqli_sql_exception){
        echo "Could not connect to database";
    }

?>
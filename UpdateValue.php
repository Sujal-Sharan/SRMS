<?php
    include("Database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="UpdateValue.php" method="post">
        <label>Enter Username</label>
        <input type="text" name="username" required><br>
        <label>Enter Password</label>
        <input type="text" name="password" required><br>
        <input type="submit" class="submit" name="submit" value="Submit">
    </form>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS); // Sanitize username
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS); // Sanitize password
    
        if(empty($username)){
            echo "Missing Username";
        }
        elseif(empty($password)){
            echo "Missing Password";
        }
        else{
            $hash = password_hash($password, PASSWORD_DEFAULT); // Hash password

            try{
                $stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $username, $hash);
                $stmt->execute();
                $stmt->close();
            }
            catch(mysqli_sql_exception){
                echo "Insert_Error";
            }

        }
    }
    mysqli_close($conn);
?>
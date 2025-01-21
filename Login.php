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
    <div class="container">
		<form action="Login.php" method="post">
            <div class="header">
                <h1>New Login</h1>
            </div>

			<label>Username:</label><br>
			<input type="text" name="username"><br>
			<label>Password:</label><br>
			<input type="password" name="password"><br>
			<input type="submit" name="login" value="Log In">

		</form>
	</div>
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
                $stmt = $conn->prepare("SELECT * FROM login WHERE username = ?");
                $stmt->bind_param("s", $_POST['username']);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();

                if ($user && password_verify($_POST['password'], $user['password'])) {
                    // $_SESSION['user_id'] = $user['id'];
                    header('location: Dashboard.html');
                    exit;
                } 
                else {
                    echo "Incorrect Username or Password";
                }

                $stmt->close();
            }
            catch(mysqli_sql_exception){
                echo "Error_New";
            }

        }
    }
    mysqli_close($conn);
?>
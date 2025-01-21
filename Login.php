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
                $sql = "SELECT * FROM login_test WHERE User_Name = '{$username}' AND Password = '{$password}'"; // SQL query to check if user exists and password is correct
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){

                    // echo "Logged in Successfully";
                    header('Location: view.html');  //Re-direct to another page
                }
                else{
                    echo "Wrong username or password";
                }
            }
            catch(mysqli_sql_exception){
                echo "Error";
            }


        }
    }
    mysqli_close($conn);
?>
<!-- hello <script>alert("VIRUS!!!");</script> -->
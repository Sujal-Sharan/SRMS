<?php
    include("Database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Styles/login.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <h1>TECHNO INTERNATIONAL NEWTOWN</h1>
            <div class="profile-icon" onclick="toggleProfile()">👤</div>
        </header>
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="toggleMenu()">×</a>
            <ul>
                <li onclick="navigate('home')">Home</li>
                <li onclick="navigate('about')">About</li>
                <li onclick="navigate('help')">Help</li>
            </ul>
        </div>
        <div id="myProfileOptions" class="profile-options">
            <a href="javascript:void(0)" class="closebtn" onclick="toggleProfile()">×</a>
            <ul>
                <li onclick="navigate('profile')">Profile</li>
                <li onclick="navigate('signout')">Sign Out</li>
                <li onclick="navigate('notifications')">Notifications</li>
                <li onclick="navigate('settings')">Settings</li>
            </ul>
        </div>

        <main>
            <div class="header">
                <h1>Login</h1>
            </div>

            <form name="login" action="login.php" method="post">
                <ul>
                    <li>Username: <input class="username" type="text" name="username" placeholder="Enter your username here" required ></li>
                    <li>Password: <input class="password" type="password" name="password" placeholder="Enter your password here" required></li>
                </ul>
                <input type="submit" id="button" class="submit" name="login" value="Log In">
            </form>
        </main>

        <footer>
            <p>
                <a href="https://tint.edu.in/">TINT Official Website</a> | 
                <a href="https://www.facebook.com/TINTOfficial">TINT Official Facebook Page</a>
            </p>
            <p>
                Techno International New Town (Formerly known as Techno India College of Technology)<br>
                BLOCK - DG 1/1, ACTION AREA 1 NEW TOWN, RAJARHAT, KOLKATA - 700156<br>
                Phone: +91-33-23242050<br>
                Email: info@tict.edu.in
            </p>
            <p>
                &copy; 2020 - Maintained by department of CSE, Techno International New Town
            </p>
        </footer>
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

                if ($user && password_verify($password, $user['password'])) {
                    // $_SESSION['user_id'] = $user['id'];
                    header('location: view.php');
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

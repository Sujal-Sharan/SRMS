<?php
    include("Database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <h1>Update</h1>
            </div>
            <div>
                <h4>Enter the new user's details below</h4>
            </div>
            <form action="UpdateValue.php" method="post">
                <ul>
                    <li>Enter Username: <input class="username" type="text" name="username" placeholder="Enter new username" required></li>
                    <li>Enter Password: <input class="password" type="password" name="password" placeholder="Enter new password" required></li>
                </ul>
                <input type="submit" id="button" name="submit" value="Submit" onclick="display()">
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
    <script>
        function display(){
            alert("Database updated");
        }
    </script>
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
                header('location: view.php');
                exit;
            }
            catch(mysqli_sql_exception){
                echo "Insert_Error";
            }

        }
    }
    mysqli_close($conn);
?>
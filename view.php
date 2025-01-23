<?php
    include("Database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxed Professional Webpage</title>
    <link rel="stylesheet" href="Styles/view.css">
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
            <h1>Welcome Admin Test</h1>
            <div class="button-container">
                <form name="homepage_Buttons" action="view.php" method="post">

                    <input type="submit" name="view" value="VIEW"><br>
                    <input type="submit" name="update" value="UPDATE"><br>
                    <input type="submit" name="delete" value="DELETE"><br>

                    <!-- <button onclick="viewAction()">VIEW</button>
                    <button onclick="updateAction()">UPDATE</button><br>
                    <button onclick="deleteAction()">DELETE</button> -->
                </form>
            </div>
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

    <script src="Scripts/view.js"></script>
</body>
</html>
<?php
    if(isset($_POST['view'])){
        // header('location: marks.html');
        header('location: choice.php');
    }
    if(isset($_POST['update'])){
        header('location: UpdateValue.php');
    }
    // if(isset($_POST['delete'])){
    //     header('location: marks.html');
    // }
?>

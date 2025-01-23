<?php
    include("Database.php");   

    $sql = "SELECT * FROM login_test WHERE User_Name = 'admin'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo $row["Table_ID"] . "<br>";
        echo $row["User_Name"] . "<br>";
        echo $row["Password"] . "<br>";
    }
    else{
        echo "No results found";
    }

    mysqli_close($conn);
?>
<?php

    if ($_COOKIE["status"] == "logged_out"){
        redirect_to("loginsignup.php");
    }
    if ($_COOKIE["authlevel"] == "user"){
        redirect_to("loginsignup.php");
    }
    function redirect_to($new_location){
        header("Location: " . $new_location);
        exit;
    }
    $redirect_link = $_POST["url"];
    $hostName = "localhost";
    $dbuser = "root";
    $dbpass = "open";
    $dbname = "library";
    $userid = $_COOKIE['userid'];
    $last_name = $_COOKIE['lastname'];
    $auth_level = $_COOKIE['authlevel'];
    $username = $_COOKIE['username'];
    $con = mysqli_connect($hostName, $dbuser, $dbpass, $dbname);
    if (mysqli_connect_errno()){
        die("Database connection failed: ".mysqli_connect_error()." (".mysqli_connect_errono().")");
    }

    //searching for a user.
    $username = "%".$_POST["username"]."%";
    $query = "SELECT user_id, user_name, first_name, last_name, image_loc FROM user_details WHERE user_name LIKE '{$username}' ORDER BY first_name ASC";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("There is no username mathced for the given username/ username portion");
    }

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Select User From The List</title>
    </head>
    <body>
        <h1>Select Your Desired User</h1>
        <ul>
            <?php
                while ($tempo = mysqli_fetch_assoc($temp)){
             ?>
             <a href="<?php echo $redirect_link; ?>&uid=<?php echo $tempo["user_id"]; ?>" style="text-decoration: none; color: black;">
                <div style="border-style: solid; border-color: black; width: 300px; margin-left: 20px;">
                        <img src="<?php echo $tempo["image_loc"]; ?>" height="30" width="30"/>
                        <?php echo $tempo["user_name"]; ?>
                        <?php echo $tempo["user_id"]; ?>
                        <?php echo $tempo["first_name"]." ".$tempo["last_name"]; ?>
                </div>
            </a>
             <?php } ?>
        </ul>
    </body>
</html>

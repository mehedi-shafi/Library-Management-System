<?php
    if ($_COOKIE["status"] == "logged_out"){
            redirect_to("loginsignup.php");
        }
    if ($_COOKIE["authlevel"] == "user"){
        echo "Log in as Adminstrator.";
        redirect_to("loginsignup.php");
    }
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
    //Getting all datas for the user
    $query = "SELECT * FROM user_details WHERE user_id='{$userid}'";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["user_name"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $type = $_POST[type];

    //image_loc
    $uploaddir = 'images/admin_pp/';
    $uploadfile = $uploaddir . time(). ".jpg";
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
      echo "File is valid, and was successfully uploaded.\n";
    } else {
       echo "Upload failed";
    }
    $image_loc = $uploadfile;
    $occupation = $_POST["occupation"];
    $fav_quote = $_POST["quote"];

    //Checking if the user already existed by the user name uniqifying
    $query = "SELECT * FROM login WHERE user_name = '{$username}'";
    $result = mysqli_query($con, $query);

    print_r($result);
    $temp = mysqli_fetch_assoc($result);
    echo "{$temp}";
    if ($temp){
        //if the user exists with the user name return to loginpage with error message
        redirect_to("add_admin.php?gave=userexists");
    }
    //else its a new user.
    //getting the maximum user id no. from the log in table
    $query = "SELECT MAX(user_id) FROM login WHERE type = 'admin' OR type = 'creator'";
    $temp = mysqli_query($con, $query);
    $temp2 = mysqli_fetch_assoc($temp);

    //increasing the current max to get the new user id
    $userid = $temp2["MAX(user_id)"];
    echo "$userid";
    $userid++;

    //creating new entry in the login table
    //
    $query = "INSERT INTO login(user_name, password, type, user_id) VALUES('{$username}', '{$password}', '{$type}', '{$userid}')";
    $test  = mysqli_query($con, $query);
    if (!$test){
        echo "short query failed";
    }

    $joined = date('Y-m-d');
    //creating new details in user_details table
    $query = "INSERT INTO user_details(user_id, first_name, last_name, email, mobile, user_name, gender, address, occupation, date_of_birth, image_loc, fav_quote, join_date)
        VALUES('{$userid}', '{$first_name}', '{$last_name}', '{$email}', '{$mobile}', '{$username}', '{$gender}', '{$address}', '{$occupation}', '{$dob}', '{$image_loc}', '{$fav_quote}', '{$joined}')";


    $test = mysqli_query($con, $query);

    if (!$test){
        echo "query failed";
    }
    mysqli_close($con);
    redirect_to("index.php");
 ?>

 <?php
     function redirect_to($new_location){
         header("Location: " . $new_location);
         exit;
     }
 ?>

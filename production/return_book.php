<?php
    if ($_COOKIE["status"] == "logged_out"){
            redirect_to("loginsignup.php");
        }
    function redirect_to($new_location){
        header("Location: " . $new_location);
        exit;
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

    $user_id = $_POST["userid"];
    $book_id = $_POST["book_id"];


    $query = "UPDATE borrow SET status = 'ret' WHERE user_id = '{$user_id}' AND book_id = '{$book_id}'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die ("Query failed trying to updating return");
    }
    if (isset ($_POST["amount"])){
        $amount = $_POST["amount"];
        $query = "INSERT INTO fine(user_id, amount) VALUES('{$user_id}', '{$amount}')";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die ("Query returned nothing for adding data in to FINE");
        }
    }
    redirect_to("withdraw_book.php?gave=success");
    mysqli_close($con);

 ?>

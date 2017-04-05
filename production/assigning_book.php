<?php
    if ($_COOKIE["status"] == "logged_out"){
            redirect_to("loginsignup.php");
        }
        function redirect_to($new_location){
            header("Location: " . $new_location);
            exit;
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

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $book_id = $_POST["book_id"];
    $user_id = $_POST["user_id"];
    $ret_date = $_POST["ret_date"];
    $date = $_POST["date"];

    $query = "SELECT availability FROM book_details WHERE book_id = '{$book_id}'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die ("Query returned nothing while trying to fetch available count for the book");
    }
    $tempo = mysqli_fetch_assoc($temp);
    $count_avail = $tempo["availability"];
    if ($count_avail <= 0){
        mysqli_close($con);
        redirect_to("assign_book.php?gave=unavailable");
    }
    $count_avail--;

    $query = "UPDATE book_details SET availability = '{$count_avail}' WHERE book_id = '{$book_id}'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die ("Query returned nothing while trying to negation the availability");
    }

    $query = "INSERT INTO borrow(user_id, book_id, date_of_taken, date_of_return) VALUES('{$user_id}', '{$book_id}', '{$date}', '{$ret_date}')";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothin while trying to assigning book");
    }

    mysqli_close($con);
    redirect_to("assign_book.php?gave=success");
 ?>

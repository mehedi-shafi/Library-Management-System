<?php


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
    $todate = new DateTime();

    $year = $todate->format('Y');
    $query = "SELECT max(month) FROM months WHERE year = '{$year}'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("No data came for maximum month last paid");
    }
    $tempo = mysqli_fetch_assoc($temp);
    $month = $tempo["max(month)"];
    $mnth = $todate->format('m');
    if ($month < $mnth){
        $query = "UPDATE user_details SET due = due + 500";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die ("Query returned nothing trying to add due");
        }
        $query = "INSERT INTO months(year, month) VALUES ('{$year}', '{$mnth}')";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die ("Query returned nothing trying to month");
        }
    }
    mysqli_close($con);



 ?>

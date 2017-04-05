<?php
//checking what is gotten from the update Password form.
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
 ?>

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

    $query = "SELECT * FROM login WHERE user_id = '{$userid}'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing for getting login credential");
    }
    $log_in_matched_data = mysqli_fetch_assoc($temp);
    if ($log_in_matched_data["password"] == $_POST["old_password"]){
        if ($_POST["new_password"] == $_POST["new_pass_confirm"]){
            $query = "UPDATE login SET password = '{$_POST["new_password"]}' WHERE user_id = '{$userid}'";
            $temp = mysqli_query($con, $query);
            if (!$temp){
                die("Query failed for attempting to update password");
            }
        }
        else{
            mysqli_close($con);
            redirect_to("update_pass.php?gave=unmatched_new");
        }
    }
    else{
        mysqli_close($con);
        redirect_to("update_pass.php?gave=unmatched_old");
    }
    mysqli_close($con);
    redirect_to("update_pass.php?gave=success");
 ?>

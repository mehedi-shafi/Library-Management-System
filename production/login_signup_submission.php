<?php
    $hostName = "localhost";
    $dbuser = "root";
    $dbpass = "open";
    $dbname = "library";

    //connection establishment
    $con = mysqli_connect($hostName, $dbuser, $dbpass, $dbname);
    //print_r($_POST);
    if (mysqli_connect_errno()){
        //in case of connection failed the connection will be corrupted
        die("Database connection failed: ".mysqli_connect_error()." (".mysqli_connect_errono().")");
    }

    //Check if the form is returned from sign up or log in form
    if ($_POST["sub_button"] == "logged_in"){
        //Fetching post data for log in
        $password = $_POST["password"];
        $username = $_POST["username"];
        echo "{$username}";
        $query = "SELECT * FROM login WHERE user_name = '{$username}'";
        $resulti = mysqli_query($con,$query);
        if (!$resulti){
            redirect_to("loginsignup.php?gave=wrong");
        }
        else{
            //Fetching datas from result returned datas

            $temp = mysqli_fetch_assoc($resulti);
            print_r($temp);
            $userid = $temp["user_id"];
            $password_g = $temp["password"];
            //Checking if the password match with the database password
            if ($password != $password_g){
                //if doesnt match return to login with error message to get
                redirect_to("loginsignup.php?gave=wrong");
            }
            $auth_level = $temp["type"];
            $query = "SELECT * FROM user_details WHERE user_id = '{$userid}'";
            $result_from_id = mysqli_query($con, $query);

            //Fetching complete data from user_details table
            $temp = mysqli_fetch_assoc($result_from_id);
            print_r($temp);
            $last_name = $temp["last_name"];
            $one_years =  365 * 24 * 60 * 60;

            // Adding frequently required data to COOKIE
            setcookie("userid", "{$userid}", time()+$one_years);
            setcookie("username", "{$username}", time()+$one_years);
            setcookie("lastname", "{$last_name}", time()+$one_years);
            setcookie("authlevel", "{$auth_level}", time()+$one_years);
            setcookie("status", "logged_in", time()+ $one_years);

            //Checking for Dues for all user.
            $query = "SELECT user_id FROM login";
            $temp = mysqli_query($con, $query);
            if (!$temp){
                die("query returned nothing 59");
            }

            function due_making($connect, $uid){
                //checking if there is due
                $query = "SELECT date_of_return FROM borrow WHERE user_id='{$uid}'";
                $temporary = mysqli_query($connect, $query);
                if (!$temporary){
                    die("Query returned nothing getting from borrow");
                }
                $due = 0;
                while ($tempu = mysqli_fetch_assoc($temporary)){
                    $date_to_be = new DateTime($tempu["date_of_return"]);
                    $todate = new DateTime();
                    $day_diff = date_diff($date_to_be, $todate);
                    $due += $day_diff->d * 25;
                }
                return $due;
            }

            while ($tempo = mysqli_fetch_assoc($temp)){
                $uid = $tempo["user_id"];
                $due_ = due_making($con, $uid);
                $query = "UPDATE user_details SET due = '{$due_}' WHERE user_id = '{$uid}'";
            }
            //closing Database
            mysqli_close($con);

            //Going into dashboard after successful log in
            redirect_to("index.php");
        }
    }
    else if ($_POST["sub_button"] == "signed_up"){
        //Fetching datas from the post

        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile_number"];
        $gender = $_POST["gender_select"];
        $address = $_POST["address"];
        $dob = $_POST["dob"];
        $type = "user";
        $image_loc = "images/profile_img/ai_pro.png";
        $occupation = "undefined";
        $fav_quote = "undefined";

        //Checking if the user already existed by the user name uniqifying
        $query = "SELECT * FROM login WHERE user_name = '{$username}'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) >= 1){
            //if the user exists with the user name return to loginpage with error message
            redirect_to("loginsignup.php?gave=userexists");
        }
        //else its a new user.
        //getting the maximum user id no. from the log in table
        $query = "SELECT MAX(user_id) FROM login WHERE type = 'user'";
        $temp = mysqli_query($con, $query);
        $temp2 = mysqli_fetch_assoc($temp);

        //increasing the current max to get the new user id
        $userid = $temp2["MAX(user_id)"];
        $userid++;

        //creating new entry in the login table
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
        redirect_to("loginsignup.php?gave=new_user");
    }
    else{
        echo "nothing";
        mysqli_close($con);
    }
 ?>
 <?php
     function redirect_to($new_location){
         header("Location: " . $new_location);
         exit;
     }
 ?>

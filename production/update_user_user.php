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
        die("Database connection failed");
    }
    //Getting all datas for the user
    $query = "SELECT * FROM user_details WHERE user_id='{$userid}'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing");
    }
    $return_row_details = mysqli_fetch_assoc($temp);

    //fetching data fromt the post variable :D :D
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $quote = $_POST["quote"];
    $occupation = $_POST["occupation"];

    if ($first_name != ""){
        $query = "UPDATE user_details SET first_name = '{$first_name}' WHERE user_id = '{$userid}'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die("Query returned nothing for updating first name");
        }
    }

    if ($last_name != ""){
        $query = "UPDATE user_details SET last_name = '{$last_name}' WHERE user_id = '{$userid}'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die("Query returned nothing for updating last name");
        }
    }

    if ($email != ""){
        $query = "UPDATE user_details SET email = '{$email}' WHERE user_id = '{$userid}'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die("Query returned nothing for updating email");
        }
    }
    if ($occupation != ""){
        $query = "UPDATE user_details SET occupation = '{$occupation}' WHERE user_id = '{$userid}'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die("Query returned nothing for updating occupation");
        }
    }

    if ($mobile != ""){
        $query = "UPDATE user_details SET mobile = '{$mobile}' WHERE user_id = '{$userid}'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die("Query returned nothing for updating mobile");
        }
    }

    if ($address != ""){
        $query = "UPDATE user_details SET address = '{$address}' WHERE user_id = '{$userid}'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die("Query returned nothing for updating address");
        }
    }

    if ($dob != ""){
        $query = "UPDATE user_details SET date_of_birth = '{$dob}' WHERE user_id = '{$userid}'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die("Query returned nothing for updating dob");
        }
    }

    if ($quote != ""){
        $query = "UPDATE user_details SET fav_quote = '{$quote}' WHERE user_id = '{$userid}'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die("Query returned nothing for updating quote");
        }
    }

    if ($_FILES){
        $uploaddir = 'images/user_pp/';
    	$uploadfile = $uploaddir . time(). ".jpg";
    	if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    	  echo "File is valid, and was successfully uploaded.\n";
    	} else {
    	   echo "Upload failed";
    	}
        $query = "UPDATE user_details SET image_loc = '{$uploadfile}' WHERE user_id = '{$userid}'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die("Query returned nothing for uploading file");
        }
    }
    mysqli_close($con);

    redirect_to("update_prof.php");
 ?>

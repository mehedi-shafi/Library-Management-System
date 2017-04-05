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
    $user_id = 0;
    if (isset($_GET["uid"])){
        $user_id = $_GET["uid"];
    }
    if (isset($_GET["confirmed"])){
        if ($_GET["confirmed"] == "yes"){
            $user_id = $_GET["uid"];
            $query = "DELETE FROM user_details WHERE user_id = '{$user_id}'";
            $temp = mysqli_query($con, $query);
            if (!$temp){
                die("Query returned nothing trying to remove the given user from user details table");
            }
            $query = "DELETE FROM login WHERE user_id = '{$user_id}'";
            $temp = mysqli_query($con, $query);
            if (!$temp){
                die("Query returned nothing trying to remove the given user from login table");
            }
            redirect_to("manage_user_admin.php");
        }
    }
 ?>
 <?php
     function redirect_to($new_location){
         header("Location: " . $new_location);
         exit;
     }

  ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Remove User</title>
         <style media="screen">
         .myButton {
                -moz-box-shadow: 3px 4px 0px 0px #8a2a21;
                -webkit-box-shadow: 3px 4px 0px 0px #8a2a21;
                box-shadow: 3px 4px 0px 0px #8a2a21;
                background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c62d1f), color-stop(1, #f24437));
                background:-moz-linear-gradient(top, #c62d1f 5%, #f24437 100%);
                background:-webkit-linear-gradient(top, #c62d1f 5%, #f24437 100%);
                background:-o-linear-gradient(top, #c62d1f 5%, #f24437 100%);
                background:-ms-linear-gradient(top, #c62d1f 5%, #f24437 100%);
                background:linear-gradient(to bottom, #c62d1f 5%, #f24437 100%);
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24437',GradientType=0);
                background-color:#c62d1f;
                -moz-border-radius:18px;
                -webkit-border-radius:18px;
                border-radius:18px;
                border:1px solid #d02718;
                display:inline-block;
                cursor:pointer;
                color:#ffffff;
                font-family:Arial;
                font-size:28px;
                padding:14px 47px;
                text-decoration:none;
                text-shadow:0px 1px 0px #810e05;
                }
                .myButton:hover {
                background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f24437), color-stop(1, #c62d1f));
                background:-moz-linear-gradient(top, #f24437 5%, #c62d1f 100%);
                background:-webkit-linear-gradient(top, #f24437 5%, #c62d1f 100%);
                background:-o-linear-gradient(top, #f24437 5%, #c62d1f 100%);
                background:-ms-linear-gradient(top, #f24437 5%, #c62d1f 100%);
                background:linear-gradient(to bottom, #f24437 5%, #c62d1f 100%);
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24437', endColorstr='#c62d1f',GradientType=0);
                background-color:#f24437;
                }
                .myButton:active {
                position:relative;
                top:1px;
                }

                .myButton2 {
                	-moz-box-shadow: 3px 4px 0px 0px #3dc21b;
                	-webkit-box-shadow: 3px 4px 0px 0px #3dc21b;
                	box-shadow: 3px 4px 0px 0px #3dc21b;
                	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #44c767), color-stop(1, #5cbf2a));
                	background:-moz-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
                	background:-webkit-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
                	background:-o-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
                	background:-ms-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
                	background:linear-gradient(to bottom, #44c767 5%, #5cbf2a 100%);
                	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#44c767', endColorstr='#5cbf2a',GradientType=0);
                	background-color:#44c767;
                	-moz-border-radius:18px;
                	-webkit-border-radius:18px;
                	border-radius:18px;
                	border:1px solid #18ab29;
                	display:inline-block;
                	cursor:pointer;
                	color:#ffffff;
                	font-family:Arial;
                	font-size:28px;
                	padding:15px 48px;
                	text-decoration:none;
                	text-shadow:0px 1px 0px #2f6627;
                }
                .myButton2:hover {
                	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #5cbf2a), color-stop(1, #44c767));
                	background:-moz-linear-gradient(top, #5cbf2a 5%, #44c767 100%);
                	background:-webkit-linear-gradient(top, #5cbf2a 5%, #44c767 100%);
                	background:-o-linear-gradient(top, #5cbf2a 5%, #44c767 100%);
                	background:-ms-linear-gradient(top, #5cbf2a 5%, #44c767 100%);
                	background:linear-gradient(to bottom, #5cbf2a 5%, #44c767 100%);
                	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5cbf2a', endColorstr='#44c767',GradientType=0);
                	background-color:#5cbf2a;
                }
                .myButton2:active {
                	position:relative;
                	top:1px;
                }


         </style>
     </head>
     <body>
         <div>
             <h3>Are you sure to remove <?php echo $user_id; ?> ?</h3>
             <a href="remove_user.php?uid=<?php echo $user_id; ?>&confirmed=yes" class="myButton">Confirm </a>
             <a href="manage_user_admin.php" class="myButton2"> Revert </a>
         </div>

     </body>
 </html>

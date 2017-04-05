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

    $bookname = "%".$_POST["bookname"]."%";

    $query = "SELECT * FROM book_details WHERE book_name LIKE '{$bookname}'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing for searching the book's name keyword you provided");
    }

    mysqli_close($con);
 ?>

 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Select Book</title>
     </head>
     <body>
         <h1>Select Your Desired Book</h1>
         <ul>
             <?php
                 while ($tempo = mysqli_fetch_assoc($temp)){
              ?>
              <a href="<?php echo $redirect_link; ?>&bid=<?php echo $tempo["book_id"]; ?>" style="text-decoration: none; color: black">
                 <div style="border-style: solid; border-color: black; width: 300px;">
                        <h3>  <?php echo $tempo["book_name"]; ?>                    </h3>
                        <h4>  <?php echo $tempo["book_id"]; ?>                      </h4>
                        <h4>  <?php echo $tempo["genre"]; ?>                        </h4>
                        <h4><?php if ($tempo["availability"] <= 0) echo "All Borrowed"; ?></h4>
                 </div>
             </a>
              <?php } ?>
         </ul>
     </body>
 </html>

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


    if (isset($_GET["uid"]) && $_GET["uid"] != 0){
        $user_id = $_GET["uid"];
        $query = "SELECT * FROM borrow WHERE user_id = '{$user_id}' AND status = 'n_ret'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die("Query returned nothing for selected user");
        }

        $fine = 0;
        echo "<h4 style=\"padding:20px; \">";
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>Book-ID</th> <th> Date Taken </th> <th> To Return </th>";
        while ($tempo = mysqli_fetch_assoc($temp)){
            echo "<tr>";
            echo " <td>{$tempo["book_id"]}</td> <td>{$tempo["date_of_taken"]}</td><td>{$tempo["date_of_return"]}</td>";
            $date_to_be = new DateTime($tempo["date_of_return"]);
            $todate = new DateTime();
            if ($todate > $date_to_be){
                $day_diff = date_diff($date_to_be, $todate);
                $fine += $day_diff->m * 25 * 30;
                $fine += $day_diff->d * 25;
            }
            echo "</tr>";
        }
        echo "<tr bgcolor=";
        if ($fine > 0) echo "\"red\">"; else echo "\"green\">";
         echo "<td> Fine</td> <td> </td> <td>  {$fine} </td>";
        echo "</tr>";
        echo "</table>";
        echo "</h4>";
    }

    mysqli_close($con);
 ?>

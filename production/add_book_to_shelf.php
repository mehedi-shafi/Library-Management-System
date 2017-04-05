<?php
    //Connecting to database and selected Database
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
    $book_id = $_GET["bid"];

    $query = "SELECT genre FROM book_list WHERE book_id = '{$book_id}'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("query failed trying to get the book genre");
    }
    $tempo = mysqli_fetch_assoc($temp);
    $genre = $tempo["genre"];
    function redirect_to($new_location){
        header("Location: " . $new_location);
        exit;
    }

    $back_to = $_GET["backto"];

    //assigning to shelf

    if ($_GET["shelf"] == "read"){
        $query = "SELECT * FROM bookshelf WHERE book_id = '{$book_id}' AND status = 'reading' AND user_id = '{$userid}'";
        $temp = mysqli_query($con, $query);
        if ($temp->num_rows == 0){
            $query = "SELECT * FROM bookshelf WHERE book_id = '{$book_id}' AND status = 'read' AND user_id = '{$userid}'";
            $tempo = mysqli_query($con, $query);
            if ($tempo->num_rows == 0){
                $query1 = "INSERT INTO bookshelf (user_id, status, book_id, genre) VALUES ('{$userid}', 'read', '{$book_id}', '{$genre}')";
                $quered = mysqli_query($con, $query1);
                if (!$quered){
                    echo "Query returned nothing attempting adding the book into shelf as read";
                }
                mysqli_close($con);
                redirect_to($back_to);
            }
        }
        else{
            $query = "DELETE FROM bookshelf WHERE book_id = '{$book_id}' AND user_id = '{$userid}'";
            $temp = mysqli_query($con, $query);
            if (!$temp){
                echo "Query returned nothing attempting to deleting the book from reading shelf";
            }
            $query1 = "INSERT INTO bookshelf (user_id, status, book_id, genre) VALUES ('{$userid}', 'read', '{$book_id}', '{$genre}')";
            $quered = mysqli_query($con, $query1);
            if (!$quered){
                echo "Query returned nothing attempting adding the book into shelf as read";
            }
            mysqli_close($con);
            redirect_to($back_to);
        }
    }

    else if ($_GET["shelf"] == "reading"){
        $query = "SELECT * FROM bookshelf WHERE book_id = '{$book_id}' AND status = 'read' AND user_id = '{$userid}'";
        $temp = mysqli_query($con, $query);
        if ($temp->num_rows == 0){
            $query = "SELECT * FROM bookshelf WHERE book_id = '{$book_id}' AND status = 'reading' AND user_id = '{$userid}'";
            $tempo = mysqli_query($con, $query);
            if ($tempo->num_rows == 0){
                $query1 = "INSERT INTO bookshelf (user_id, status, book_id, genre) VALUES ('{$userid}', 'reading', '{$book_id}', '{$genre}')";
                $quered = mysqli_query($con, $query1);
                if (!$quered){
                    echo "Query returned nothing attempting adding the book into shelf as reading";
                }
                mysqli_close($con);
                redirect_to($back_to);
            }
        }
        else{
            $query = "DELETE FROM bookshelf WHERE book_id = '{$book_id}' AND user_id = '{$userid}'";
            $temp = mysqli_query($con, $query);
            if (!$temp){
                echo "Query returned nothing attempting to deleting the book from read shelf";
            }
            $query1 = "INSERT INTO bookshelf (user_id, status, book_id, genre) VALUES ('{$userid}', 'reading', '{$book_id}', '{$genre}')";
            $quered = mysqli_query($con, $query1);
            if (!$quered){
                echo "Query returned nothing attempting adding the book into shelf as reading";
            }
            mysqli_close($con);
            redirect_to($back_to);
        }
    }
 ?>

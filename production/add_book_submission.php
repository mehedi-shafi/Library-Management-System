<?php
    echo "<pre>";
        print_r($_POST);
    echo "</pre>";
    echo "<pre>";
        print_r($_FILES);
    echo "</pre>";


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
    $book_name = $_POST["book_name"];
    $writer = $_POST["writer"];
    $genre = $_POST["genret"];
    $summary = $_POST["summary"];
    $amount = $_POST["amount"];
    $date = $_POST["date"];

    //getting new book_id

    $query = "SELECT MAX(book_id) FROM book_list";
    $temp = mysqli_query($con, $query);
    $temp2 = mysqli_fetch_assoc($temp);

    //increasing the current max to get the new user id
    $bookid = $temp2["MAX(book_id)"];
    $bookid++;



    $uploaddir = 'images/book_cover/';
    $uploadfile = $uploaddir . time(). ".jpg";
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
      echo "File is valid, and was successfully uploaded.\n";
    } else {
       echo "Upload failed";
    }

    //inserting book into book list
    $query = "INSERT INTO book_list(book_id, book_name, genre) VALUES('{$bookid}', '{$book_name}', '{$genre}')";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing for inserting values in book_list");
    }

    $query = "INSERT INTO book_details (book_id, book_name, genre, writer, summary, availability, published_on, img_src) VALUES('{$bookid}', '{$book_name}', '{$genre}', '{$writer}', '{$summary}', '{$amount}', '{$date}', '{$uploadfile}')";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die ("Query returned nothing trying to insert values into book_details");
    }
    redirect_to("add_book.php?gave=success");
    mysqli_close($con);
 ?>

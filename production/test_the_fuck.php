<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>test fuck</title>
    </head>
    <body>
        <form class="" action="user_search.php?prev=assign" method="post">
            <input type="text" name="username" value="" placeholder="user_name">
            <input type="submit" name="sub" value="go">
        </form>

        <?php $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            echo $actual_link;
         ?>
         <br />

         <?php
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            echo $actual_link;
          ?>
    </body>
</html>

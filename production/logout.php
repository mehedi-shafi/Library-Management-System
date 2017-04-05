<?php
    $one_years =  365 * 24 * 60 * 60;
    setcookie("status", "logged_out", time()+$one_years);
    setcookie("userid", "", time()+$one_years);
    setcookie("username", "", time()+$one_years);
    setcookie("lastname", "", time()+$one_years);
    setcookie("authlevel", "", time()+$one_years);
    redirect_to("landing.php");
 ?>
 <?php
     function redirect_to($new_location){
         header("Location: " . $new_location);
         exit;
     }
 ?>

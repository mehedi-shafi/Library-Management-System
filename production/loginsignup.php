<?php
    if ($_COOKIE["status"] == "logged_in"){
        redirect_to("index.php");
    }
    function redirect_to($new_location){
        header("Location: " . $new_location);
        exit;
    }
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='css/font.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/normalize.min.css">
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
    $shout = "";
    if (isset($_GET["gave"])){
         $shout = $_GET["gave"];
    }
   ?>

   <h3 style="color: white; text-align: center; top:10px;">
   <?php
       if ($shout== "wrong"){
           echo "Wrong Credential Try Logging in Again";
       }
       else if($shout == "userexists"){
           echo "There is already a user with the user name try different one";
       }
       ?>
   </h3>
  <div class="form">

      <ul class="tab-group">

        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <h1>Sign Up for Free</h1>

          <form action="login_signup_submission.php" method="post" name="sign_up">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name ="first_name"/>
            </div>

            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="last_name"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
                Choose an Username <span class="req"> * </span>
            </label>
            <input type="text" autocomplete="off" required name="username"/>
          </div>
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="email"/>
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password"/>
          </div>

          <div class="field-wrap">
            <label>
                Mobile Number <span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="mobile_number"/>
          </div>

          <div class="field-wrap">
            <label>
                Address <span class="req">*</span>
            </label>
            <input type="text" autocomplete="off" required name="address"/>
          </div>

          <div class="field-wrap">
              <label>
                  Gender <span class="req">*</span>
              </label> <br/> <br/> <br/>
              <select class="select_gen" id="gender_select" name="gender_select" required>
                <option value="male"> Male </option>
                <option value="female"> Female </option>
              </select>
          </div>

          <div>
              <label class="field-wrap">
                  Date of Birth <span class="req"> * </span>
              </label>

              <input type="date" name="dob" required autocomplete="off" name="dob" placeholder="YYYY/MM/DD"/>
          </div>
          <br/> <br/> <br/>

          <button type="submit" class="button button-block" name="sub_button" value="signed_up"/>Get Started</button>

          </form>

        </div>

        <div id="login">
          <h1>Welcome Back!</h1>

          <form action="login_signup_submission.php" method="post" name="log_in">

            <div class="field-wrap">
            <label>
              User Name<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="username"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password"/>
          </div>
         <!--
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          -->

          <button type="submit" class="button button-block" name="sub_button" value="logged_in"/>Log In</button>

          </form>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='js/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>

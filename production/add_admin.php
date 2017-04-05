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
    //Getting all datas for the user
    $query = "SELECT * FROM user_details WHERE user_id='{$userid}'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing");
    }
    $return_row_details = mysqli_fetch_assoc($temp);

    mysqli_close($con);
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Admin</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span> Dashboard </span></a>
              </div>

              <div class="clearfix"></div>

              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="<?php echo $return_row_details["image_loc"]; ?>" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>Welcome</span>
                  <h2> <?php echo $return_row_details["last_name"]; ?></h2>
                </div>
              </div>
              <!-- /menu profile quick info -->

              <br />

              <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <h3> <?php echo $auth_level; ?> </h3>

                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> General <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="index.php">Summary</a></li>
                        <li><a href="bookshelf.php">Bookshelf</a></li>
                        <li><a href="libstat.php">Library Statistics</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Profile <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="profile.php">View Profile</a></li>
                        <li><a href="update_prof.php">Update Profile</a></li>
                        <li><a href="update_pass.php">Change Password</a></li>
                      </ul>
                    </li>

                  <?php if ($auth_level == "creator" || $auth_level == "admin"){ ?>
                    <li><a> Admin <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="assign_book.php">Assign Book(s)</a></li>
                        <li><a href="manage_user_admin.php">Manage User</a></li>
                        <li><a href="add_admin.php"> Add admin </a></li>
                        <li><a href="payment.php"> Payment </a></li>
                        <li><a href="withdraw_book.php">Withdraw Book</a></li>
                        <li><a href="add_book.php">Add A Book</a></li>
                        <li><a href="report_choose.php">Generate Reports</a></li>
                      </ul>
                    </li>
                    <?php } ?>

                    <li><a> Browse <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="booklist.php">Book List</a></li>
                        <li><a href="projects.php"> About Project </a></li>
                      </ul>
                    </li>

                  </ul>
                </div>
              </div>
              <!-- /sidebar menu -->

              <!-- /menu footer buttons -->
              <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
              </div>
              <!-- /menu footer buttons -->
            </div>
          </div>

          <!-- top navigation -->
          <div class="top_nav">
            <div class="nav_menu">
              <nav>
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                  <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?php echo $return_row_details["image_loc"]; ?> " alt=""> <?php echo "{$return_row_details["first_name"]} {$return_row_details["last_name"]}"; ?>
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a href="profile.html"> Profile</a></li>
                      <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Payment</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form enctype="multipart/form-data" action="add_admin_submission.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <select class="form-control" name="type">
                              <option value="nada"> Class </option>
                              <option value="admin">Admin</option>
                              <option value="moderator">Moderator</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="first_name" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" class="form-control col-md-7 col-xs-12" name="last_name" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">User Name
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="user_name" class="form-control col-md-7 col-xs-12" name="user_name" placeholder="choose an unique username">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="password" class="form-control col-md-7 col-xs-12" name="password">
                          </div>
                        </div>
                        <div class="form-group">
                          <label name="email" class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" name="email"  class="form-control col-md-7 col-xs-12" placeholder="example@domain.com">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="contact" class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="contact" class="form-control col-md-7 col-xs-12" type="text" name="mobile" placeholder="01xxxxxxxxx">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="address" class="form-control col-md-7 col-xs-12" type="text" name="address">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="occupation" class="control-label col-md-3 col-sm-3 col-xs-12">Occupation</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="occupation" class="form-control col-md-7 col-xs-12" type="text" name="occupation">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="birthday" class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="birthday" placeholder="YYYY-MM-DD" name="dob" class="date-picker form-control col-md-7 col-xs-12" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                              <label class="btn btn-primary">
                                <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                              </label>
                              <label class="btn btn-primary">
                                <input type="radio" name="gender" value="female"> Female
                              </label>

                          </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quote">Profile Quote
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="quote" id="quote"  class="date-picker form-control col-md-7 col-xs-12" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Picture
                          </label>
                          <div class="btn-group">
                            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                            <input name="image" type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                          </div>
                        </div>
                      <div class="ln_solid"></div>


                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <!-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> -->
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>

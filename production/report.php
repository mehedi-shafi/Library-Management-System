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

    $query = "";
    $date = "";
    if ($_POST["report_type"] == "payment"){
        if ($_POST["day"] != "00" && $_POST["month"] != "00" && $_POST["year"] != "00" ){
            $date = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
            $query = "SELECT * FROM payment WHERE pay_date = '{$date}'";
        }
        else if ($_POST["month"] != "00" &&  $_POST["year"] != "00" && $_POST["day"]=="00"){
            $date = $_POST["year"]."-".$_POST["month"]."%";
            $query = "SELECT * FROM payment WHERE pay_date LIKE '{$date}'";
        }
        else if ($_POST["year"] != "00" &&  $_POST["day"]=="00" && $_POST["month"]=="00"){
            $date = $_POST["year"]."%";
            $query = "SELECT * FROM payment WHERE pay_date LIKE '{$date}'";
        }
        else{
            redirect_to("report_choose.php?gave=error");
        }
    }
    else if ($_POST["report_type"] == "borrow"){
        if ($_POST["day"] != "00" && $_POST["month"] != "00" && $_POST["year"] != "00" ){
            $date = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
            $query = "SELECT * FROM borrow WHERE date_of_taken = '{$date}'";
        }
        else if ($_POST["month"] != "00" && $_POST["year"] != "00" && $_POST["day"]=="00"){
            $date = $_POST["year"]."-".$_POST["month"]."%";
            $query = "SELECT * FROM borrow WHERE date_of_taken LIKE '{$date}'";
        }
        else if ($_POST["year"] != "00" && $_POST["day"]=="00" && $_POST["month"]=="00"){
            $date = $_POST["year"]."%";
            $query = "SELECT * FROM borrow WHERE date_of_taken LIKE '{$date}'";
        }
        else{
            redirect_to("report_choose.php?gave=error");
        }
    }
    else if ($_POST["report_type"] == "fine"){
        if ($_POST["day"] != "00" && $_POST["month"] != "00" && $_POST["year"] != "00" ){
            $date = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
            $query = "SELECT * FROM fine WHERE date_recieved = '{$date}'";
        }
        else if ($_POST["month"] != "00" && $_POST["year"] != "00" && $_POST["day"]=="00"){
            $date = $_POST["year"]."-".$_POST["month"]."%";
            $query = "SELECT * FROM fine WHERE date_recieved LIKE '{$date}'";
        }
        else if ($_POST["year"] != "00" && $_POST["day"]=="00" && $_POST["month"]=="00"){
            $date = $_POST["year"]."%";
            $query = "SELECT * FROM fine WHERE date_recieved LIKE '{$date}'";
        }
        else{
            redirect_to("report_choose.php?gave=error");
        }
    }
    else{
        redirect_to("report_choose.php?gave=error");
    }
    //echo $query;
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die ("Query returned nothing trying to fetching data for given report type and time");
    }

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

    <title>Report</title>

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
                <h3>Report</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />

                    <!-- if requires data for borrowed books for that day or that month or that year -->
                    <?php if ($_POST["report_type"] == "borrow") {?>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Borrowed Books <small>for <?php echo $date; ?></small></h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>Book ID</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while ($tempo = mysqli_fetch_assoc($temp)){ ?>
                              <tr >
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $tempo["user_id"]; ?></td>
                                <td><?php echo $tempo["book_id"]; ?></td>
                              </tr>
                                <?php $i++; } ?>
                                <tr bgcolor="#f1f1f1">
                                  <th scope="row">#</th>
                                  <td>Total Borrowed:</td>
                                  <td><?php echo $i-1; ?></td>
                                </tr>
                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <!-- !if requires data for borrowed books for that day or that month or that year -->

                    <br />

                    <!-- if requires data for monthly payments for that day or that month or that year -->
                    <?php $amount = 0; if ($_POST["report_type"] == "payment") {?>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Payment Collection <small>for <?php echo $date; ?></small></h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while ($tempo = mysqli_fetch_assoc($temp)){ ?>
                              <tr >
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $tempo["user_id"]; ?></td>
                                <td><?php echo $tempo["amount"]; ?></td>
                              </tr>
                                <?php $i++; $amount+= $tempo["amount"];} ?>
                                <tr bgcolor="#f1f1f1">
                                  <th scope="row">#</th>
                                  <td>Total Collection:</td>
                                  <td><?php echo $amount; ?></td>
                                </tr>
                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <!-- !if requires data for monthly payment for that day or that month or that year -->

                    <br />

                    <!-- if requires data for fine collection for that day or that month or that year -->

                    <?php $amount = 0; if ($_POST["report_type"] == "fine") {?>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Fine Collection <small>for <?php echo $date; ?></small></h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while ($tempo = mysqli_fetch_assoc($temp)){ ?>
                              <tr >
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $tempo["user_id"]; ?></td>
                                <td><?php echo $tempo["amount"]; ?></td>
                              </tr>
                                <?php $i++; $amount+= $tempo["amount"];} ?>
                                <tr bgcolor="#f1f1f1">
                                  <th scope="row">#</th>
                                  <td>Total Collection:</td>
                                  <td><?php echo $amount; ?></td>
                                </tr>
                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <!-- !if requires data for fine collection for that day or that month or that year -->

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

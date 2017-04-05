<?php
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
        die("Database connection failed: ".mysqli_connect_error()." (".mysqli_connect_errono().")");
    }

    //changing target
    if (isset($_GET["target"])){
        $query = "";
        if ($_GET["target"] == "increase"){
            $query = "UPDATE user_details SET target = target  + 1 WHERE user_id = '{$userid}'";
        }
        else{
            $query = "UPDATE user_details SET target = target - 1 WHERE user_id = '{$userid}'";
        }
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die ("Query returned nothing trying to update the target for the user");
        }
    }

    //Getting all datas for the user
    $query = "SELECT * FROM user_details WHERE user_id='{$userid}'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing");
    }
    $return_row_details = mysqli_fetch_assoc($temp);


    //getting list of book that has been read
    $query = "SELECT book_id FROM bookshelf WHERE user_id='{$userid}' AND status = 'read'";
    $read_book_ids = mysqli_query($con, $query);
    if (!$read_book_ids){
        die("Query returned nothing");
    }
    //getting count of read bookshelf
    $query = "SELECT COUNT(book_id) FROM bookshelf WHERE user_id='{$userid}' AND status = 'read'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing");
    }
    $tempo = mysqli_fetch_assoc($temp);
    $read_count = $tempo["COUNT(book_id)"];

    //getting list of book that is being read marked
    $query = "SELECT book_id FROM bookshelf WHERE user_id='{$userid}' AND status = 'reading'";
    $reading_book_ids = mysqli_query($con, $query);
    if (!$reading_book_ids){
        die("Query returned nothing");
    }
    //getting count of reading bookshelf
    $query = "SELECT COUNT(book_id) FROM bookshelf WHERE user_id='{$userid}' AND status = 'reading'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing");
    }
    $tempo = mysqli_fetch_assoc($temp);
    $reading_count = $tempo["COUNT(book_id)"];

    //getting list of borrowed book that hasn't been returned
    $query = "SELECT book_id FROM bookshelf WHERE user_id='{$userid}' AND status = 'borrowed'";
    $borrowed_book_ids = mysqli_query($con, $query);
    if (!$borrowed_book_ids){
        die ("Query returned nothing");
    }

    //getting count of borrowed book
    $query = "SELECT COUNT(book_id) FROM bookshelf WHERE user_id='{$userid}' AND status = 'borrowed'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing");
    }
    $tempo = mysqli_fetch_assoc($temp);
    $borrowed_count = $tempo["COUNT(book_id)"];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bookshelf</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
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
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="count"><?php echo $read_count; ?></div>
                  <h3>Total Reads</h3>
                  <p> Number of books you marked read</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="count"><?php echo $reading_count; ?></div>
                  <h3> Reading </h3>
                  <p> Number of books marked currently reading </p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="count"><?php echo $borrowed_count; ?></div>
                  <h3> Borrowed </h3>
                  <p> Have borrowed from library and haven't returned yet </p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="count">
                      <?php echo $return_row_details["target"]; ?>
                      <a href="bookshelf.php?target=increase"><button class="btn btn-primary" type="button" name="button">+</button></a>
                      <a href="bookshelf.php?target=decrease"><button class="btn btn-danger" type="button" name="button">-</button></a>
                  </div>
                  <h3>Target</h3>
                  <p>Target Set for current Year</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12" style="padding: 20px;">
                <div class="x_panel">

                    <!-- Scrolling Currently reading pane -->
                    <div class="col-md-3 col-sm-12 col-xs-12" style="overflow: scroll;">
                      <div>
                        <div class="x_title">
                          <h2>Read</h2>
                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                          <li class="media event">
                            </a>
                            <?php
                                if ($read_count == 0){ ?>
                                    <li class="media event">
                                    <div class="media-body">
                                      <a class="title" href="#">No book read</a>
                                      <p><strong>Mark Read </strong> To add </p>
                                    </div>
                                    </li>
                            <?php }
                                else{
                                    while ($temp_book_id = mysqli_fetch_assoc($read_book_ids)){
                                        $query = "SELECT * FROM book_details WHERE book_id = '{$temp_book_id["book_id"]}'";
                                        $temp = mysqli_query($con, $query);
                                        if (!$temp){
                                            die("Query returned nothing");
                                        }
                                        $book = mysqli_fetch_assoc($temp);
                            ?>
                            <li class="media event">
                            <div class="media-body">
                              <a class="title" href="#"> <?php echo $book["book_name"]; ?></a>
                              <p><?php echo $book["writer"]; ?></p>
                              <p> <?php echo $book["genre"];  ?> </p>
                            </div>
                            <?php } ?>
                            </li>
                            <?php } ?>

                        </ul>
                      </div>
                    </div>
                    <!--  end Scrolling Currently reading pane -->
                    <!-- Scrolling READ pane -->
                    <div class="col-md-3 col-sm-12 col-xs-12" style="overflow: scroll;">
                      <div>
                        <div class="x_title">
                          <h2> Reading </h2>
                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                            <li class="media event">
                              </a>
                              <?php
                                  if ($reading_count == 0){ ?>
                                      <li class="media event">
                                      <div class="media-body">
                                        <a class="title" href="#">No book reading</a>
                                        <p><strong>Mark Reading </strong> To add </p>
                                      </div>
                                      </li>
                              <?php }
                                  else{
                                      while ($temp_book_id = mysqli_fetch_assoc($reading_book_ids)){
                                          $query = "SELECT * FROM book_details WHERE book_id = '{$temp_book_id["book_id"]}'";
                                          $temp = mysqli_query($con, $query);
                                          if (!$temp){
                                              die("Query returned nothing");
                                          }
                                          $book = mysqli_fetch_assoc($temp);
                              ?>
                              <li class="media event">
                              <div class="media-body">
                                <a class="title" href="#"> <?php echo $book["book_name"]; ?></a>
                                <p><?php echo $book["writer"]; ?></p>
                                <p> <?php echo $book["genre"];  ?> </p>
                              </div>
                              <?php } ?>
                              </li>
                              <?php } ?>
                        </ul>
                      </div>
                    </div>
                    <!--  end Scrolling READ pane -->

                    <!-- Scrolling WISHLIST pane -->
                    <div class="col-md-3 col-sm-12 col-xs-12" style="overflow: scroll;">
                      <div>
                        <div class="x_title">
                          <h2>Borrowed</h2>
                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                            <li class="media event">
                              </a>
                              <?php
                                  if ($borrowed_count == 0){ ?>
                                      <li class="media event">
                                      <div class="media-body">
                                        <a class="title" href="#">All book returned</a>
                                        <p><strong>Read More </strong>  </p>
                                      </div>
                                      </li>
                              <?php }
                                  else{
                                      while ($temp_book_id = mysqli_fetch_assoc($borrowed_book_ids)){
                                          $query = "SELECT * FROM book_details WHERE book_id = '{$temp_book_id["book_id"]}'";
                                          $temp = mysqli_query($con, $query);
                                          if (!$temp){
                                              die("Query returned nothing");
                                          }
                                          $book = mysqli_fetch_assoc($temp);
                              ?>
                              <li class="media event">
                              <div class="media-body">
                                <a class="title" href="#"> <?php echo $book["book_name"]; ?></a>
                                <p><?php echo $book["writer"]; ?></p>
                                <p> <?php echo $book["genre"];  ?> </p>
                              </div>
                              <?php } ?>
                              </li>
                              <?php } ?>
                        </ul>
                      </div>
                    </div>
                    <!--  end Scrolling WISHLIST pane -->

                  </div>
                </div>
              </div>
            </div>
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
<?php mysqli_close($con) ?>

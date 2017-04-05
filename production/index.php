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
    //Getting all datas for the user
    $query = "SELECT * FROM user_details WHERE user_id='{$userid}'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing getting user_details");
    }
    $return_row_details = mysqli_fetch_assoc($temp);

    //getting number of book that has been read
    $query = "SELECT count(book_id) FROM bookshelf WHERE user_id='{$userid}' and status='read'";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing for getting book count for the user");
    }
    $return_row_bookshelf = mysqli_fetch_assoc($temp);

    //getting genre queue ;)
    $query = "SELECT genre, count(book_id) FROM bookshelf WHERE user_id = '{$userid}' GROUP BY(genre) ORDER BY count(book_id) DESC";
    $temp = mysqli_query($con, $query);
    if (!$temp){
        die("Query returned nothing trying fetching book count for the each group");
    }

    //Variables required for this poge fetcing
    $read_number = $return_row_bookshelf['count(book_id)'];
    $first_name = $return_row_details['first_name'];
    $last_read = $return_row_details['last_read'];
    $join_date = $return_row_details['join_date'];
    $image_loc = $return_row_details['image_loc'];
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Summary </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
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
                    <img src="<?php echo $image_loc; ?> " alt=""> <?php echo "{$return_row_details["first_name"]} {$return_row_details["last_name"]}"; ?>
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
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <div class="count" style="color: rgb(51, 120, 232); font-size: 25px;"> Summary </div>
            </div>
          </div>

          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"> Book Read </span>
              <div class="count"> <?php echo $read_number; ?></div>
            </div>
          </div>
          <!-- /top tiles -->
          <br />

          <div class="row tile_count">
            <div>
              <span class="count_top"> <h3> &emsp; Last Read </h3> </span>
              <div class="count"><h1> <i> <b> &emsp; &emsp; &emsp; <?php echo $last_read; ?> </b> </i></h1> </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2> Taste Pie </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Genre</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class=""> Amount </p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <table class="tile_info">
                        <?php while($genre_row = mysqli_fetch_assoc($temp)){?>
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i> <?php echo $genre_row['genre']; ?> </p>
                            </td>
                            <td><?php echo $genre_row['count(book_id)']; ?></td>
                          </tr>
                          <?php } ?>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"> Join Date </span>
              <div class="count" style="font-size: 20px;"> <?php echo $join_date; ?> </div>
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
            Library by Error Not Found ©
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
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
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
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
<?php
    mysqli_close($con);
 ?>

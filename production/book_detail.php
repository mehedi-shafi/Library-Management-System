<?php
    if ($_COOKIE["status"] == "logged_in"){
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
            die("Query returned nothing");
        }
        $return_row_details = mysqli_fetch_assoc($temp);

        $book_id = $_GET["bid"];
        $query = "SELECT * FROM book_details WHERE book_id = '{$book_id}'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die ("Query returnded nothing trying to fetch data from book_details");
        }
        $book_details = mysqli_fetch_assoc($temp);
        mysqli_close($con);
    }
    else{
        $hostName = "localhost";
        $dbuser = "root";
        $dbpass = "open";
        $dbname = "library";
        $con = mysqli_connect($hostName, $dbuser, $dbpass, $dbname);
        if (mysqli_connect_errno()){
            die("Database connection failed: ".mysqli_connect_error()." (".mysqli_connect_errono().")");
        }
        $book_id = $_GET["bid"];
        $query = "SELECT * FROM book_details WHERE book_id = '{$book_id}'";
        $temp = mysqli_query($con, $query);
        if (!$temp){
            die ("Query returnded nothing trying to fetch data from book_details");
        }
        $book_details = mysqli_fetch_assoc($temp);
        mysqli_close($con);
    }
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $book_details["book_name"]; ?> </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

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

              <?php if ($_COOKIE["status"] == "logged_in"){ ?>
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
              <?php } else{ ?>
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="landing.php"><i class="fa fa-home"></i> Home </a> </li>
                            <li><a href="booklist.php"><i class="fa fa-home"></i> Browse Books </a></li>
                        </ul>
                    </div>
                  </div>

              <?php } ?>
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

                <?php if ($_COOKIE["status"] == "logged_in"){ ?>
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
                <?php } ?>

              </nav>
            </div>
          </div>
          <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Book Detail</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $book_details["book_name"]; ?></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <div class="product-image">
                        <img src="<?php echo $book_details["img_src"]; ?>" alt="book_image" />
                      </div>

                    </div>

                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                      <h3 class="prod_title"><?php echo $book_details["writer"]; ?></h3>
                      <h4><b>Summary</b></h4>
                      <p><?php echo $book_details["summary"]; ?></p>
                      <br />


                      <br />
                      <p><b>Publish Date: </b><?php echo $book_details["published_on"]; ?></p>

                      <br />

                      <div class="">
                        <div class="product_price">
                          <h1 class="price"><?php if ($book_details["availability"] > 0) echo "Available"; else echo "<font color=\"red\">All Borrowed </font>";?></h1>

                          <br>
                        </div>
                      </div>
                      <!-- mark as -->
                      <!-- <div class="">
                        <button type="button" class="btn btn-default btn-lg">Read</button>
                        <button type="button" class="btn btn-default btn-lg">Reading</button>

                      </div> -->



                      <!-- <div class="x_panel">
                        <div class="x_title">
                          <h2>Mark As</h2>

                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                          <button type="button" class="btn btn-round btn-info">Read</button>
                          <button type="button" class="btn btn-round btn-warning">Reading</button>
                        </div>
                      </div> -->
                      <?php if ($_COOKIE["status"] == "logged_in"){ ?>
                          <div class="btn-group">
                          <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">Mark As <span class="caret"></span>
                          </button>
                          <ul role="menu" class="dropdown-menu">
                            <li><a href="add_book_to_shelf.php?shelf=read&bid=<?php echo $_GET["bid"]; ?>&backto=<?php echo $actual_link; ?>">Read</a>
                            </li>
                            <li><a href="add_book_to_shelf.php?shelf=reading&bid=<?php echo $_GET["bid"]; ?>&backto=<?php echo $actual_link; ?>">Reading</a>
                            </li>
                          </ul>
                          </div>
                      <?php } ?>
                    </div>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>

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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>

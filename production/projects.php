<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>About Project</title>

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
        <div class="col-md-3 left_col" style="">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span> Dashboard </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <!-- <img src="" alt="..." class="img-circle profile_img"> -->
              </div>

              <div class="profile_info">
                <span>Welcome</span>
                <?php if($_COOKIE["status"] == "logged_in"){ ?>
                <h2> <?php echo $_COOKIE["lastname"]; ?></h2>
                <?php } ?>
              </div>
            </div>

            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">

                <ul class="nav side-menu">
                  <li>
                      <a href="projects.php">About Us</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top"  href="#">

              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">

          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Library Management System</h3>
              </div>
            </div>

        <!-- Members' Details -->
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Team Members </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Project Connected Member Details</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Member</th>
                          <th>Section</th>
                          <th>Progress</th>
                          <th>Status</th>
                          <th style="width: 20%">Profile</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>01</td>
                          <td>
                            <a>Israt Jahan Fateha</a>
                            <br />
                            <small>151-15-5036</small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <p> Landing </p>
                              </li>
                              <li>
                                <p> Help </p>
                              </li>
                              <li>
                                <p> View Book </p>
                              </li>
                              <li>
                                <p> Navigation </P>
                              </li>
                              <li>
                                <p> Members' Pages </p>
                              </li>
                              <li>
                                <p>Form Making</p>
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100"></div>
                            </div>
                            <small>100% Complete</small>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Completed</button>
                          </td>
                          <td>
                            <a href="profile-fateha.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                          </td>
                        </tr>
                        <tr>
                          <td>02</td>
                          <td>
                            <a>Mehedi Imam Shafi</a>
                            <br />
                            <small>151-15-5248</small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <p> Dashboard </p>
                              </li>
                              <li>
                                <p> Database Connection </P>
                              </li>
                              <li>
                                <p> Data Manipulation </P>
                              </li>
                              <li>
                                <p> Website Design </P>
                              </li>
                              <li>
                                <p> Database Design </P>
                              </li>
                              <li>
                                <p> Project Manager </P>
                              </li>
                              <li>
                                <p>Designing</p>
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100"></div>
                            </div>
                            <small>100% Complete</small>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Completed</button>
                          </td>
                          <td>
                            <a href="profile-shafi.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                          </td>
                        </tr>
                        <tr>
                          <td>03</td>
                          <td>
                            <a>Sajiya</a>
                            <br />
                            <small>151-15-5256</small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <p> Log-In </p>
                              </li>
                              <li>
                                <p> Data Entry </p>
                              </li>
                              <li>
                                <p> Image processing </p>
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100"></div>
                            </div>
                            <small>100% Complete</small>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Completed</button>
                          </td>
                          <td>
                            <a href="profile-sajiya.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                          </td>
                        </tr>
                        <tr>
                          <td>04</td>
                          <td>
                            <a>Sanjida Tasnim</a>
                            <br />
                            <small>143-15-4397</small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <p> Sign Up </p>
                              </li>
                              <li>
                                <p>Data Entry</p>
                              </li>
                              <li>
                                <p>Data Retrival</p>
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100"></div>
                            </div>
                            <small>100% Complete</small>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Completed</button>
                          </td>
                          <td>
                            <a href="profile-sanjida.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                          </td>
                        </tr>
                        <tr>
                          <td>05</td>
                          <td>
                            <a>Tahia Eva</a>
                            <br />
                            <small>151-15-4824</small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <p>Data Entry</p>
                              </li>
                              <li>
                                <p>Data Fetching</p>
                              </li>
                              <li>
                                <p>Beta Testing</p>
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100"></div>
                            </div>
                            <small>100% Complete</small>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Completed</button>
                          </td>
                          <td>
                            <a href="profile-eva.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="">
            <div class="page-title">
            </div>

        <!-- Members' Details -->
        <!-- /Team Members' Details -->

        <!--  Project works -->

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Project Divisions </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Project Divisions and Work Details</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Division</th>
                          <th>Sub Division</th>
                          <th>Progress</th>
                          <th>Status</th>
                          <th style="width: 20%">Assigned</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>01</td>
                          <td>
                            <a>Website Design</a>
                            <br />
                            <small>Mapping the pages and their connection</small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <p> Naming </p>
                              </li>
                              <li>
                                <p> Connection </p>
                              </li>
                              <li>
                                <p> Hierarchy </p>
                              </li>
                              <li>
                                <p> Documentation </P>
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100"></div>
                            </div>
                            <small>100% Complete</small>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Completed</button>
                          </td>
                          <td>
                            <a href="profile-shafi.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Shafi </a>
                          </td>
                        </tr>
                        <tr>
                          <td>02</td>
                          <td>
                            <a> Database Deisigning</a>
                            <br />
                            <small>Builging Database and its table with their inner relations</small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <p> Designing </p>
                              </li>
                              <li>
                                <p> Creation </P>
                              </li>
                              <li>
                                <p> Sample entry </P>
                              </li>
                              <li>
                                <p> Table making </P>
                              </li>
                              <li>
                                <p> sample query making </P>
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100"></div>
                            </div>
                            <small>100% Complete</small>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Completed</button>
                          </td>
                          <td>
                            <a href="profile-shafi.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Shafi </a>
                          </td>
                        </tr>
                        <tr>
                          <td>03</td>
                          <td>
                            <a> Website Making </a>
                            <br />
                            <small>Building the web pages with required language or using template</small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <p> Design </p>
                              </li>
                              <li>
                                <p> Coding </p>
                              </li>
                              <li>
                                <p>Testing</p>
                              </li>
                              <li>
                                <p>Importing</p>
                              </li>
                              <li>
                                <p> Flow Control </p>
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100"></div>
                            </div>
                            <small>100% Complete</small>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Completed</button>
                          </td>
                          <td>
                            <a href="profile-fateha.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Fateha </a>
                            <a href="profile-shafi.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Shafi </a>
                            <a href="profile-eva.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Tahia </a>
                            <a href="profile-sanjida.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Sanjida </a>
                            <a href="profile-sajiya.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Sajiya </a>
                          </td>
                        </tr>
                        <tr>
                          <td>04</td>
                          <td>
                            <a>Data Entry</a>
                            <br />
                            <small>Adding required data into the database</small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <p> Fetching </p>
                              </li>
                              <li>
                                <p> Analyzing </p>
                              </li>
                              <li>
                                <p>Dividing</p>
                              </li>
                              <li>
                                <p> Entering into database </p>
                              </li>
                              <li>
                                <p> Validating </p>
                              </li>
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100"></div>
                            </div>
                            <small>100% Complete</small>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Completed</button>
                          </td>
                          <td>
                            <a href="pfofile-sajiya.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Sajiya </a>
                            <a href="profile-sanjida.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Sanjida </a>
                            <a href="profile-eva.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Tahia </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="title_left">
            <h5>External Links</h5>
          </div>
          <a href="#" class="btn btn-primary btn-xs" style="width: 100%; height: 50px; font-size: 30px;"><i class="fa fa-folder"></i> Reference(s) </a>
          <a href="#" class="btn btn-primary btn-xs" style="width: 100%; height: 50px; font-size: 30px;"><i class="fa fa-folder"></i> Project Repository </a>

          <!-- project details -->
        </div>

        <!-- /page content -->


        <!-- footer content -->
        <footer>

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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>

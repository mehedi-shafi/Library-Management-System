<?php
    if (!isset($_COOKIE["status"])){
        setcookie("status", "logged_out", time() * 365 * 24 * 60 * 60);
    }
 ?>

<!DOCTYPE html>
<!--[if IE 7 ]>    <html lang="cs" class="ie7 no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="cs" class="ie8 no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="cs" class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="cs" class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />

		<title>Library</title>
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






		<link rel="stylesheet" href="css/landing_fonts.css" />
		<link rel="stylesheet" href="./css/styles.css" media="screen, projection" />
		<link rel="stylesheet" href="./css/developerss.css" media="screen, projection" />
		<link rel="stylesheet" href="./css/prints.css" media="print" />
		<script>document.documentElement.className = document.documentElement.className.replace('no-js', 'js');</script>
		<script src="js/modernizr.js"></script>
        <style>
          .foot_link{
            text-decoration: none;
          }
        </style>
	</head>
	<body>
		<header id="header" style="background-color: #152431">
			<div class="row-main">
				<h1 id="logo">Error Not Found</h1>

				<nav id="menu-main">
					<strong class="title">Menu</strong>
					<ul class="reset">
						<li><a href="#about_us">About Us</a></li>
						<li><a href="projects.php">About Project</a></li>
						<!-- <li><a href="#collection">Browse collection</a></li> -->
						<li><a href="#help">Help</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<section id="main">

			<article class="box-annot">
				<div class="row-main">
					<div class="col col-h-1 grid-h">
						<p class="center">
							<img src="./img/1book.png" alt="" width="500" height="478" />
						</p>
					</div>
					<div class="col col-h-2 grid-h">
						<h1>Welcome To Our Library</h1>
						<!-- <p class="annot">(And Our  Highest-Converting “Lead Magnet”)</p> -->
						<blockquote>
				            <p class="desc" id="quote"></p>
				            <p class="name" id="author"></p>
				        </blockquote>
				        <script type="text/javascript">
                        var quotes = ["Books are the quietest and most constant of friends; they are the most accessible and wisest of counselors, and the most patient of teachers.",
                                    "Perfection is always a work in progress.",
                                    "A room without books is like a body without a soul.",
                                    "Good friends, good books, and a sleepy conscience: this is the ideal life.",
                                  "Outside of a dog, a book is man's best friend. Inside of a dog it's too dark to read.",
                                "Sometimes, you read a book and it fills you with this weird evangelical zeal, and you become convinced that the shattered world will never be put back together unless and until all living humans read the book.",
                              "Never trust anyone who has not brought a book with them.",
                            "If one cannot enjoy reading a book over and over again, there is no use in reading it at all.",
                          "I find television very educating. Every time somebody turns on the set, I go into the other room and read a book.",
                        "There is no friend as loyal as a book",
                      "What really knocks me out is a book that, when you're all done reading it, you wish the author that wrote it was a terrific friend of yours and you could call him up on the phone whenever you felt like it. That doesn't happen much, though.",
                    "′Classic′ - a book which people praise and don't read.",
                  "Books are the ultimate Dumpees: put them down and they’ll wait for you forever; pay attention to them and they always love you back.",
                "You have to write the book that wants to be written. And if the book will be too difficult for grown-ups, then you write it for children.",
                "The books that the world calls immoral are books that show the world its own shame.",
                "Books are a uniquely portable magic.",
                "A great book should leave you with many experiences, and slightly exhausted at the end. You live several lives while reading.",
                "In a good bookroom you feel in some mysterious way that you are absorbing the wisdom contained in all the books through your skin, without even opening them.",
                "Some books should be tasted, some devoured, but only a few should be chewed and digested thoroughly.",
                "Sleep is good, he said, and books are better",
                "Books are the perfect entertainment: no commercials, no batteries, hours of enjoyment for each dollar spent. What I wonder is why everybody doesn't carry a book around for those inevitable dead spots in life."];
                        var authors = [" ― CHarles William Eliot",
                                    " ― Shafi",
                                    " ― Marcus Tullius Cicero",
                                    " ― Mark Twain",
                                  " ― Groucho Marx",
                                " ― John Green",
                              " ― Lemony Snicket",
                            " ― Oscar Wilde",
                            " ― Groucho Marx",
                            " ― Ernest Hemingway",
                          " ― J.D. Salinger",
                        " ― Mark Twain",
                      " ― John Green",
                    " ― Madeleine L'Engle",
                  " ― Oscar Wilde",
                  " ― Stephen King",
                " ― William Styron",
                " ― Mark Twain",
                " ― Francis Bacon",
                " ― Stephen King"];

				            var i = Math.floor(Math.random() * 19) + 1;
							document.getElementById("quote").innerHTML = quotes[i];
							document.getElementById("author").innerHTML = authors[i];
							i++;
				            setInterval(change, 6000);

				            function change(){
				                document.getElementById("quote").innerHTML = quotes[i];
				                document.getElementById("author").innerHTML = authors[i];
				                i++;
				                if (i >= quotes.length){
				                    i = 0;
				                }
				            }
				        </script>
						<br>
						<a href="loginsignup.php"><button class="btn btn-primary" type="reset" style="padding:20px; background-color: #108CEF; "><b>Join Us/ Log in</b></button></a>
					</div>
				</div>
			</article><!-- / box-annot -->

			<div class="box-btn" style="background-color: #152431">
				<div class="row-main" >
					<p class="r">
						<a href="booklist.php" class="btn thickbox">
							<span class="underline">Browse collection</span>
						</a>
					</p>
					<div class="ctx">
						<p>Join Us ! It's 100% free.</p>
					</div>
				</div>
			</div><!-- / box-btn -->

		</section>

        <div class="foot" style="background-color: #DCDCDC; margin: 0">

          <table  border="0", style="text-decoration: none">

              <tr>

                <td><b>Features</b></td>
                <td><b>Platform</b></td>
                <td><b>Team</b></td>
                <td><b>Resources</b></td>


              </tr>

              <tbody>


                <tr>

                  <td><a href="#" class="foot_link">Code Review</a></td>
                  <td><a href="#" class="foot_link">Atom</a></td>
                  <td><a href="#" class="foot_link">About Us</a></td>
                  <td><a href="#" class="foot_link">Help</a></td>
                </tr>
                <tr>
                  <td><a href="#" class="foot_link">Reoprt</a></td>
                  <td><a href="#" class="foot_link">Developers</a></td>
                  <td><a href="#" class="foot_link">About Project</a></td>
                  <td><a href="#" class="foot_link">Privacy</a></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>


              </tbody>


        </table>

        <foot>
          <p style="text-align: center">Copyright &copy; 2017 ERROR NOT FOUND | <a href="#">Legal information</a></p>
        </foot>

		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/cs_CZ/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<script src="./js/jquery.js"></script>
		<script src="./js/sk.js"></script>
		<script src="./js/app.js"></script>
		<script>
			App.run({})
		</script>
	</body>
</html>

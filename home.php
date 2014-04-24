<!DOCTYPE HTML>
<!--
	Striped 2.5 by HTML5 Up!
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php session_start();?>
<html>
	<head>
		<title>Share And Save - DashBoard</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
	</head>
	<!--
		Note: Set the body element's class to "left-sidebar" to position the sidebar on the left.
		Set it to "right-sidebar" to, you guessed it, position it on the right.
	-->
	<body class="left-sidebar">

		<!-- Wrapper -->
			<div id="wrapper">

				<?php
				$dbhost = 'localhost:3036';
				$dbuser = 'root';
				$dbpass = 'mas';
				$conn = mysql_connect($dbhost, $dbuser, $dbpass);
				if(! $conn )
				{
				  die('Could not connect: ' . mysql_error());
				}

				$user_name = $_SESSION['user'];

				$sql = "SELECT * ".
				       "FROM events";

				mysql_select_db('mas');
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
				  die('Could not get data: ' . mysql_error());
				}

				?>

				<!-- Content -->
					<div id="content">
						<div id="content-inner">
					
							<!-- Post -->
								<article class="is-post is-post-excerpt">
									<header>
										<h2><a href="#">Welcome <?php echo $_SESSION['user'];?></a></h2>
									</header>
							

							<?php 
							while ( $row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
							$url = "showevent.php?name=".$row['id'];
							?>
							<!-- Post -->
								<article class="is-post is-post-excerpt">
									<header>

										<h2><?php echo "<a href='".$url."'>"; echo $row['event_name']; echo "</a>"; ?></h2>
										<span class="byline"><?php echo $row['location']; ?></span>
									</header>
									<div class="info">
										<span class="date"><span ><?php echo $row['event_date']; ?></span></span>
									</div>
									<p>
										<?php echo $row['description']; ?>
									</p>

									<p>
										<form action="attend-event.php" method="post">
												<input type="hidden" name="user_name" value=<?php echo $_SESSION['user']; ?>></input> 
												<input type="hidden" name="event_id" value=<?php echo $row['id']; ?>></input>
												<input type="submit"  value="Attend"></input>
												<div class="clear"></div>
										</form>
									</p>
								</article>
                            <?php 

                            }

							mysql_close($conn);
                            ?>

                    </div>
                </div>

            <!-- Sidebar -->
					<div id="sidebar">
					
						<!-- Logo -->
							<div id="logo">
								<h1>Share and Save</h1>
							</div>
					
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li ><a href="home.php">Dashboard</a></li>
									<li><a href="preference.php">Preferences</a></li>
									<li><a href="logout.php">Logout</a></li>
								</ul>
							</nav>

						<!-- Search -->
							<section class="is-search">
								<form method="post" action="#">
									<input type="text" class="text" name="search" placeholder="Search" />
								</form>
							</section>
					
						
							<div id="copyright">
								<p>
									&copy; 2014 Share and Save.<br />
									Images: <a href="http://n33.co">n33</a>, <a href="http://fotogrph.com">fotogrph</a><br />
									Design: <a href="http://html5up.net/">HTML5 UP</a>
								</p>
							</div>

					</div>

			</div>

	</body>
</html>
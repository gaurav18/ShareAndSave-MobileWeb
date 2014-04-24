<!DOCTYPE HTML>
<html>
	<head>
		<title>Share and Save</title>
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
	</head>
	<!--
		Note: Set the body element's class to "left-sidebar" to position the sidebar on the left.
		Set it to "right-sidebar" to, you guessed it, position it on the right.
	-->
	<body class="right-sidebar">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Content -->
					<div id="content">
						<div id="content-inner">
					
						

                                <!-- Post -->
                                <article class="is-post is-post-excerpt">
                                    <header>
                                        <h2><a href="#">Register</a></h2>
                                        <span class="byline">Enter details here</span>
                                    </header>
                                    <p>
                                        <form action="insert_user.php" class="register active" method="post">
											<div class="column">
												<div>
													<label>Name:</label>
													<input type="text" name="user_name"/>
												</div>
												<div>
													<label>Username:</label>
													<input type="text" />
												</div>
												<div>
													<label>Blood group(tap the textbox to select)</label>
													<select name="user_grp">
													  <option value="A+">A+</option>
													  <option value="A-">A-</option>
													  <option value="B+">B+</option>
													  <option value="B-">B-</option>
													  <option value="O+">O+</option>
													  <option value="O-">O-</option>
													  <option value="AB+">AB+</option>
													  <option value="AB-">AB-</option>
													</select>
												</div>
											
												<div>
													<label>Email:</label>
													<input type="text" name="user_email"/>
												</div>
												<div>
													<label>Password:</label>
													<input type="password" name="user_pwd"/>
												</div>
												<div>
													<label>Address:</label>
													<input type="text" name="user_address"/>
												</div>
											</div>
											<div class="bottom">
											
											<input type="submit" value="Register" />
												<a href="index.php" rel="login" class="linkform">You have an account already? Log in here</a>
												<div class="clear"></div>
											</div>
										</form>
                                    </p>
                                </article>


                    </div>
                </div>
				
				

			</div>

	</body>
</html>
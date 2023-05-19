<?php session_start(); if(!isset($_SESSION["userEmail"])) { header('Refresh: 0; url=index.php'); } ?>

<!DOCTYPE HTML>

<!--
	Author: 
	Front-End: John Yohan J. Navarra
	Back-End: Angelo Kurt B. Rosal
-->

<!--
	NOTE!!

	This part of the website includes the user profile with the information on the left side and the user's (uploaded, with default image in place) image.
	
-->

<html>
	<head>
		<title>Yverdon Book Management System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<!--The icon beside the title on the website's tab on the browser, change directory accordingly.-->
		<link rel="apple-touch-icon" sizes="180x180" href="images/favicon_io/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon_io/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon_io/favicon-16x16.png">
		<link rel="manifest" href="images/favicon_io/site.webmanifest">

	</head>
	
	<body class="right-sidebar is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" class="wrapper">

					<!-- Logo -->
						<div id="logo">
							<h1><span><a href="home.php">Yverdon Book Management System</a></span></h1>
							<p><b>The online book management system for Yverdon de Pestalozzi School</b></p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="home.php"><strong>Home</strong></a></li>
								<li>
									<a href="books.php"><strong>Books</strong></a>
									<ul>
										<li><a href="books.php">Non-fiction</a></li>
										<li><a href="books.php">Education</a></li>
										<li><a href="books.php">Fiction</a></li>
										<li><a href="books.php">Literature</a></li>
										<li><a href="books.php">Entertainments</a></li>
										<li><a href="books.php">Philosophy</a></li>
									</ul>
								</li>
								<li><a href="userProfile.php"><strong>User Profile</strong></a></li>
								
								<!--Add logout link here-->
								<li><a href="index.php"><strong>Logout</strong></a></li>
							</ul>
						</nav>
				</section>

			<!-- Main -->
				<section id="main" class="wrapper style3">
					<div class="title">User Profile</div>
					<div class="container">
						<div class="row gtr-150">
							<div class="col-8 col-12-medium">

								<!-- Content -->
									<div id="content">
										<article class="box post userProf">
											<header class="style1" style="padding-bottom: 0;">
												<h3 id="displayName" value="fname">null</h3>
											</header>

											<img class="image featured"src="images/pic01.jpg" alt="" style="width: 100%; height: 150px; border: none; margin-bottom: 2em;" />
											
											<div id="profile-container">
   												<image id="profileImage" src="http://lorempixel.com/100/100" />
											</div>
											<input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required="" capture>

											<p><strong>Information</strong></p>
											<p>First Name: <span class="textHere" id="fname" value="fname" contenteditable="false">null</span></p>
											<p>Last Name: <span class="textHere" id="lname"  value="lname" contenteditable="false">null</span></p>
											<p>Grade Level: <span class="textHere" id="grade" value="grade" contenteditable="false">null</span></p>
											<p>Section: <span class="textHere" id="section" value="section" contenteditable="false">null</span></p>
											<p>Email: <?php echo $_SESSION["userEmail"]; ?></p>
											<p>Current Password: <span class="textHere" id="password" value="password" contenteditable="false">null</span></p>
											<p id="nP" style="display: none;">New Password: <span class="textHere" id="newPassword" contenteditable="false" style="margin-left: 0;"></span></p><br />
											<p id="cP" style="display: none;">Confirm Password: <span class="textHere" id="confirmPassword" contenteditable="false" style="margin-left: 0;"></span></p><br />
											
											<button class="editInfo style3" style="display:inline-block;" onclick="editText()" id="textEdit">Edit</button>
											<button class="editInfo style3" style="display:none;" onclick="cancelText()" id="textCancel">Cancel</button>
											<button class="editInfo style1" style="display:none;" onclick="saveText()" id="textSave">Save</button>

										</article>


									</div>

							</div>
							<div class="col-4 col-12-medium">

								<!-- Sidebar -->
									<div id="sidebar">
										<section class="box">

										</section>

										<section class="box">
											<header>
												<h2>Recent</h2>
											</header>
											<ul class="style2 recent">
												<li style="border-top-color: transparent;">
													<article class="box post-excerpt">
														<a href="#" class="image left"><img src="images/covers/metro-2033.jpg" alt=""/></a>
														<h3 style="margin-left: 6.5em;"><a href="#">Title: Insert Here</a></h3>
														<a href="books/.html" class="button style1 recentBtn">More</a>
													</article>
												</li>
												<li style="border-top-color: transparent;">
													<article class="box post-excerpt">
														<a href="#" class="image left"><img src="images/covers/metro-2034.jpg" alt=""/></a>
														<h3 style="margin-left: 6.5em;"><a href="#">Title: Insert Here</a></h3>
														<a href="books/.html" class="button style1 recentBtn">More</a>
													</article>
												</li>
												<li style="border-top-color: transparent;">
													<article class="box post-excerpt">
														<a href="#" class="image left"><img src="images/covers/metro-2035.jpg" alt=""/></a>
														<h3 style="margin-left: 6.5em;"><a href="#">Title: Insert Here</a></h3>
														<a href="books/.html" class="button style1 recentBtn">More</a>
													</article>
												</li>
											</ul>
										</section>
										
									</div>

								</div>

								<div class="favorites">
									<h2 style="margin-bottom: 30px; padding-top: 70px;">My Favorites</h2>
										
										<div class="row gtr-150">
											<div class="col-4 col-12-small" style="display: grid; justify-items: center;">
												<section class="box" >
													<img src="images/covers/metro-2033.jpg" alt="" class="image featured"/>
													<center>
														<header>
															<h2>Metro 2033</h2>
														</header>
														<a href="books/.html" class="button style1">More</a>
													</center>
												</section>
											</div>
											<div class="col-4 col-12-small" style="display: grid; justify-items: center;">
												<section class="box" >
													<img src="images/covers/metro-2034.jpg" alt="" class="image featured"/>
													<center>
														<header>
															<h2>Metro 2034</h2>
														</header>
														<a href="books/.html" class="button style1">More</a>
													</center>
												</section>
											</div>
											<div class="col-4 col-12-small" style="display: grid; justify-items: center;">
												<section class="box" >
													<img src="images/covers/metro-2035.jpg" alt="" class="image featured"/>
													<center>
														<header>
															<h2>Metro 2035</h2>
														</header>
														<a href="books/.html" class="button style1">More</a>
													</center>
												</section>
											</div>
										</div>
                                                                  </div>
						</div>
					</div>
				</section>

			<!-- Footer -->
				<section id="footer" class="wrapper">
					<div class="title">Want to know more?</div>
					<div class="container">
						<header class="style1">
							<h2>Check out the library.<br> Visit us to check out those awesome books!</h2>
							<p style="color: rgb(72, 77, 85);">Or hit us up with a message...</p>
					

						</header>
						<div class="row">
							<div class="col-6 col-12-medium">

								<!-- Contact Form -->
								<section>
									<script src="assets/js/request.js"></script>
									<form method="post">
										<div class="row gtr-50">
											<div class="col-12">
												<textarea style="max-width: 100%;" name="message" id="contact-message" placeholder="Message" rows="4" required></textarea>
											</div>
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit" class="style1" value="Send" onclick="return requestAccept('Feedback')" /></li>
													<li><input type="reset" class="style2" value="Reset" style="color: #484d55;" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>
								<p id="demo"></p>
							</div>

							<div class="col-6 col-12-medium">

								<!-- Contact -->
									<section class="feature-list small">
										<div class="row">
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon solid fa-home">Address</h3>
													<p>
														Official Yverdon de Pestalozzi School, Inc.<br />
														Igay Rd., Sto. Cristo, SJDM
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon solid fa-comment">Social</h3>
													<p>
														<a href="https://www.facebook.com/1997ydpsi">facebook.com/1997ydpsi</a>
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon solid fa-envelope">Email</h3>
													<p>
														<a href="#">ydpsedu@ymail.com</a>
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon solid fa-phone">Phone/Mobile</h3>
													<p>
														(044) 307 3381<br>
														09178504350
													</p>
												</section>
											</div>
										</div>
									</section>

							</div>
						</div>
						<div id="copyright">
							<ul>
								<li>&copy; Das Kumarades LLC. EST. 2023. All rights reserved.</li><li><a href="about.php" style="text-decoration: none;">About us</a></li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</div>
				</section>

		</div>

		<!-- Scripts -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script>
				getProfileData();
			</script>

	</body>
</html>
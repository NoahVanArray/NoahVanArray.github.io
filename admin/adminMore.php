<!DOCTYPE HTML>

<!--
	Author: 
	Front-End: John Yohan J. Navarra
-->

<!--
	NOTE!!

	This part of the website includes the book section, specifically the categories, supposedly with a search bar for easier searching of books.
	
-->

<html>
	<head>
		<title>Yverdon Book Management System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />

		<!--The icon beside the title on the website's tab on the browser, change directory accordingly.-->
		<link rel="apple-touch-icon" sizes="180x180" href="../images/favicon_io/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon_io/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon_io/favicon-16x16.png">
		<link rel="manifest" href="../images/favicon_io/site.webmanifest">

	</head>
	<body class="left-sidebar is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" class="wrapper">

					<!-- Logo -->
						<div id="logo">
							<h1><span><a href="home.html">Yverdon Book Management System</a></span></h1>
							<p><b>The online library for Yverdon de Pestalozzi School</b></p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="adminHome.php"><strong style="color: #fff;">Home</strong></a></li>
								<li>
									<a href="adminBooks.php"><strong style="color: #fff;">Editing</strong></a>
									<ul>
										<li><a href="adminBooks.php">Books</a></li>
										<li><a href="adminUsers.php">Users</a></li>
										<li><a href="adminRequests.php">Requests</a></li>
										<li><a href="adminFeedback.php">Feedback</a></li>
										<li><a href="adminLogs.php">Logs</a></li>
									</ul>
								</li>
								<li><a href="adminProfile.php"><strong style="color: #fff;">User Profile</strong></a></li>
								
								<!--Add logout link here-->
								<li><a href="../index.php"><strong style="color: #fff;">Logout</strong></a></li>
							</ul>
						</nav>
				</section>

			<!-- Main -->
				<section id="main" class="wrapper style3">
					<div class="title">Books</div>
					<div class="container">
						
							<div class="col-8 col-12-medium imp-medium">

								<!-- Content -->
									<div id="content">

										<div class="row gtr-150">
											<div class="col-4 col-12-small bookPage" style="width: 100%;">
												
													<section class="box">
															
														<?php
															$select = $_REQUEST["select"];
															$conn = mysqli_connect("localhost", "root", "", "ydpbms");
															if ($conn -> connect_error) {
																die("Connection failed:". $conn -> connect_error);
															}
															else {
																$stmt = $conn -> prepare("select * from books where name = ?");
																$stmt -> bind_param("s", $select);
																$stmt -> execute();
																$result = $stmt -> get_result();
																$row = $result -> fetch_assoc();
																$availability;
																if ($row["stock"] > 0) { $availability = "Available ( ".$row["stock"]." in stock )"; }
																else if ($row["stock"] < 1) { $availability = "Unavailable"; }
															}
															echo '
																<center>
																	<img class="bookImg" src="../'.$row["imgUrl"].'" alt="" class="image featured insta1"/>
																</center>
																<div class="bookContent">
																	<header>
																		<h2>'.$row["name"].'</h2>
																	</header>
																	<p><strong>Availability: '.$availability.'<span id="availability"></span></strong></p>
																	<p class="pStr"><strong>Author: </strong>'.$row["author"].'</p>
																	<p class="pStr"><strong>Original Publisher: </strong>'.$row["publisher"].'</p>
																	<p class="pStr"><strong>Category: </strong>'.$row["category"].'</p>
																	<p class="pStr"><strong>Genre: </strong>'.$row["genre"].'</p>
																	<p class="pStr"><strong>Year Published: </strong>'.$row["originyear"].'</p><br />
																	<p class="pStr" style="margin-bottom: 0;">'.$row["description"].'</p>
																</div>
															';
														?>
														
													</section>
												<button class="btnBack style1"><a href="adminBooks.php">Back</a></button>

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
												<textarea maxlength="400" style="max-width: 100%;" name="message" id="contact-message" placeholder="Message" rows="4" required></textarea>
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
														<a href="#">facebook.com/1997ydpsi</a>
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
								<li>&copy; Das Kumarades LLC. EST. 2023. All rights reserved.</li><li><a href="../about.php" style="text-decoration: none;">About us</a></li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</div>
				</section>

		</div>

		<!-- Scripts -->
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/jquery.dropotron.min.js"></script>
		<script src="../assets/js/browser.min.js"></script>
		<script src="../assets/js/breakpoints.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/main.js"></script>
		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	</body>
</html>


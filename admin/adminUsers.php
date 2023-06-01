<?php session_start(); if(!isset($_SESSION["userEmail"]) || !isset($_SESSION["isAdmin"])) { header('Refresh: 0; url=../index.php'); } ?>
<!DOCTYPE HTML>

<!--
	Author: 
	Front-End: John Yohan J. Navarra
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
	
	<body class="homepage is-preload" onload="loginCheck()">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" class="wrapper">

					<!-- Logo -->
						<div id="logo">
							<h1><span><a href="adminHome.php">Yverdon Book Management System</a></span></h1>
							<p style="font-weight: 700;">The online book management system for Yverdon de Pestalozzi School</p>
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
					<div class="title">Users</div>
					<div class="container">
						<div class="row gtr-150">
							<div class="col-4 col-12-medium">

								<!-- Sidebar -->
									<div id="sidebar">
										<section class="box">
											<header>
												<h2 style="color: #2f333b;">General Information</h2>
											</header>
											<ul class="style2">
												<li>
													<article class="box">
														<h3>Active users: &lt;Insert value here&gt;</h3>
													</article>
												</li>
												<li>
													<article class="box">
														<h3>Total number of visits: &lt;Insert value here&gt;</h3>
													</article>
												</li>
												<li>
													<article class="box">
														<h3>Number of borrowed books: &lt;Insert value here&gt;</h3>
													</article>
												</li>
											</ul>

										<!-- Show table info -->
											<div class="row gtr-50">
												<form method="post" action="#" style="max-width: 100%; width: 100%;">
													<div class="row gtr-50 addBookContent" id="infoContent" style="margin-top: 0; display: none;">
														<header>
															<h2 style="color: #2f333b; margin-bottom: -25px;">User Information</h2>
														</header>
											
														<h3>Name: &lt;Insert value here&gt;</h3>
											
														<h3>Grade: &lt;Insert value here&gt;</h3>
												
														<h3>Section: &lt;Insert value here&gt;</h3>
														
														<h3 style="margin-right: 50px;">Email: &lt;Insert value here&gt;</h3>

														<a class="button style1" style="min-width: 0; line-height: 2.5; height: 34px; width: 98px;margin: 0 5px 0 15px; padding: 0;">Update User</a>
														<a class="button style3" style="min-width: 0; line-height: 2.5; height: 34px; width: 98px;margin: 0 0 0 10px; padding: 0;">Delete User</a>
														<a class="button style2" style="min-width: 0; line-height: 2.5; height: 34px; width: 98px;margin: 0 5px 0 15px; padding: 0;" onclick="closeInfo()">Close</a>
													</div>
												</form>
											</div>

											<!-- <a class="button style1" style="min-width: 0; width: 120px;">Update</a>
											<a class="button style3" style="min-width: 0; width: 120px;">Delete</a>
											<a class="button style2" style="min-width: 0; width: 120px;">close</a> -->
										</section>
									</div>

							</div>

							<div class="col-8 col-12-medium imp-medium">
								
								<!-- Search Bar -->
									<form style="margin-bottom: 50px;">
										<input type="text" placeholder="Search Here" name="search" id="searchBar" onkeyup="showSearch(this.value)" style="padding-right: 110px;">
									</form>

								<!-- Sorting -->
								<button id="sortByButton" value="sortTableUsers" onclick="toggleDisplayUsers(this.value)">Sort By</button>
								
								<ul id="sortTableUsers" style="display: none;">
									<li style="list-style-type: none;">
										<ul>
											<li><h1 id="sortOrder">Order: Ascending</h1></li>
											<li><button class="sortTableBtn" value="asc" onclick="printMessage(this.value)" style="float: left; margin-right: 20px;">Ascending</button></li>
											<li><button class="sortTableBtn" value="desc" onclick="printMessage(this.value)">Descending</button></li>
										</ul>
									</li>
									<li style="list-style-type: none;">
										<ul>
											<li><h1 id="sortPriority">Priority: Name</h1></li>
											<li><button class="sortTableBtn" value="name" onclick="printMessage(this.value)" style="float: left; margin-right: 20px; margin-bottom: 5px;">Name</button></li>
											<li><button class="sortTableBtn" value="id" onclick="printMessage(this.value)" style="float: left; margin-right: 20px; margin-bottom: 5px;">ID</button></li>
											<li><button class="sortTableBtn" value="author" onclick="printMessage(this.value)" style="float: left; margin-right: 20px; margin-bottom: 5px;">Author</button></li>
											<li><button class="sortTableBtn" value="publisher" onclick="printMessage(this.value)" style="float: left; margin-right: 20px; margin-bottom: 5px;">Publisher</button></li>
											<li><button class="sortTableBtn" value="year" onclick="printMessage(this.value)">Year</button></li>
										</ul>
									</li>
								</ul>

								<!-- Content -->
									<div id="content">

										<table>
										  <tr>
										    <th>Name</th>
										    <th>Grade</th>
										    <th>Section</th>
										    <th>Email</th>
										    <th>Select</th>
										  </tr>
										  <tr>
										    <td>Person#1</td>
										    <td>Insert Grade</td>
										    <td>Insert Section</td>
										    <td>Insert Email</td>
										    <th><a class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" onclick="openInfo()">Select</a></th>
										  </tr>
										  <tr>
										    <td>Person#2</td>
										    <td>Insert Grade</td>
										    <td>Insert Section</td>
										    <td>Insert Email</td>
										    <th><a class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" onclick="openInfo()">Select</a></th>
										  </tr>
										  <tr>
										    <td>Person#3</td>
										    <td>Insert Grade</td>
										    <td>Insert Section</td>
										    <td>Insert Email</td>
										    <th><a class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" onclick="openInfo()">Select</a></th>
										  </tr>
										  <tr>
										    <td>Person#4</td>
										    <td>Insert Grade</td>
										    <td>Insert Section</td>
										    <td>Insert Email</td>
										    <th><a class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" onclick="openInfo()">Select</a></th>
										  </tr>
										  <tr>
										    <td>Person#5</td>
										    <td>Insert Grade</td>
										    <td>Insert Section</td>
										    <td>Insert Email</td>
										    <th><a class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" onclick="openInfo()">Select</a></th>
										  </tr>
										  <tr>
										    <td>Person#6</td>
										    <td>Insert Grade</td>
										    <td>Insert Section</td>
										    <td>Insert Email</td>
										    <th><a class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" onclick="openInfo()">Select</a></th>
										  </tr>
										  <tr>
										    <td>Person#7</td>
										    <td>Insert Grade</td>
										    <td>Insert Section</td>
										    <td>Insert Email</td>
										    <th><a class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" onclick="openInfo()">Select</a></th>
										  </tr>
										  <tr>
										    <td>Person#8</td>
										    <td>Insert Grade</td>
										    <td>Insert Section</td>
										    <td>Insert Email</td>
										    <th><a class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" onclick="openInfo()">Select</a></th>
										  </tr>
										  <tr>
										    <td>Person#9</td>
										    <td>Insert Grade</td>
										    <td>Insert Section</td>
										    <td>Insert Email</td>
										    <th><a class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" onclick="openInfo()">Select</a></th>
										  </tr>
										  <tr>
										    <td>Person#10</td>
										    <td>Insert Grade</td>
										    <td>Insert Section</td>
										    <td>Insert Email</td>
										    <th><a class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" onclick="openInfo()">Select</a></th>
										  </tr>
										</table>
										
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


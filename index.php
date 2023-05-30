<?php session_start(); session_unset(); ?>
<!DOCTYPE html>

<!--
	Author: 
	Front-End: John Yohan J. Navarra
	Back-End: Angelo Kurt B. Rosal
-->

<!--
	NOTE!!
	This part of the website is for the login and registration of the website.
-->

<html>
 
	<head>
		<title>YBMS Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" rel="stylesheet">
		
		<!-- The icon beside the title on the website's tab on the browser, change directory accordingly. -->
		<link rel="apple-touch-icon" sizes="180x180" href="images/favicon_io/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon_io/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon_io/favicon-16x16.png">
		<link rel="manifest" href="images/favicon_io/site.webmanifest">

		<!-- Fonts (Bebas Neue, Oswald) -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@600&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="assets/css/login.css" />

	</head>
	

	<body>
			
		<div class="main">	
			<center>
				<img id="img1" src="images/logoNoBG.png">
				
				<h1 class="text">
					<span class="firstLine">Yverdon De</span><br> <span class="secondLine">Pestalozzi</span><br> <span class="thirdLine">School Inc.</span>
				</h1>
				<br>
				<p class="text text2">
					Book Management<br> System
				</p>
				<br>
				<button class="btnLogin-popup btnLogin">
					Login
				</button>

				<br>
				
			</center>
		</div>
		
		<center>
		<!-- Whole Login/Registration Form -->
		<div class="logRegForm">

			<!-- Close Icon -->
			<div class="icon-close">
				<ion-icon name="close-outline"></ion-icon>
			</div>

			<!-- Login -->
			<div class="form-box login">
				<h2>Login</h2>
				<form action="indexcheck.php" method="post">

					<div class="input-box">
						<span class="icon">
							<ion-icon name="mail"></ion-icon>
						</span>
						<input type="email" name="emailvar" placeholder="Email" required>
					</div>

					<div class="input-box">
						<span class="icon">
							<ion-icon name="eye-off" class="seePass" onclick="myFunction()" id="eye" autocomplete="off"></ion-icon>
						</span>
						<input type="password" placeholder="Password" id="passInput" name="passwordvar" required>
					</div>

					<div class="remember-forgot">
						<label></label>
						<a href="forgot.php" target="_blank">Forgot Password?</a>
					</div>

					<div>
						<button type="submit" name="loginSubmit" value="submit" class="btn">Login</button>
						<div class="login-register">
							<p>Don't have an account? <a href="#" class="register-link">Register</a></p>
						</div>
					</div>

				</form>
			</div>

			<!-- Registration -->
			<div class="form-box register">
				<h2>Registration</h2>

				<form action="indexcheck.php" method="post">
					<div class="input-box input-half half">
						<span class="icon">
							<ion-icon name="person"></ion-icon>
						</span>
						<input type="text" name="fname2" placeholder="First Name" required>
					</div>

					<div class="input-box input-half">
						<span class="icon">
							<ion-icon name="person"></ion-icon>
						</span>
						<input type="text" name="lname2" placeholder="Last Name" required>
					</div>

					<div class="input-box lower-half input-half half">
						<span class="icon">
							<ion-icon name="school"></ion-icon>
						</span>
						<input type="number" name="grade2" placeholder="Grade (1-12)" min="1" max="12" required>
					</div>

					<div class="input-box lower-half input-half">
						<span class="icon">
							<ion-icon name="school"></ion-icon>
						</span>
						<input type="text" name="section2" placeholder="Section" required>
					</div>

					<div class="input-box" style="clear: both;">
						<span class="icon">
							<ion-icon name="mail"></ion-icon>
						</span>
						<input type="email" name="email2" placeholder="Email" required>
					</div>
						<button type="submit" name="registerSubmit" value="submit" class="btn">Register</button>
						<div class="login-register">
						<p>Already have an account? <a href="#" class="login-link">Login</a></p>
						</div>
					</div>
				</form>
			</div>
		</div>
		</center>

		<center>
			<div class="alertPopup">
															
		
			
			<!-- Popup -->
				<div class="alertText">
					<h2>User doesn't exist!</h2>
					<p>Please try again.</p>
					<input type="submit" class="alertBtn1" value="Close" style="min-width: 0;" onclick="closeAlert()">
				</div>												
			</div>
		</center>
		
		<script src="assets/js/login.js"></script>
		<script src="assets/js/request.js"></script>
		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	</body>

</html>

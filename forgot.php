<?php session_start(); ?>
<!DOCTYPE html>

<!--
	Author: 
	Front-End: John Yohan J. Navarra
	Back-End: Angelo Kurt B. Rosal
-->

<!--
	NOTE!!
	This part of the website is for the forget password page of the website.
-->

<html>
 
	<head>
		<title>YBMS Forgot Password</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" rel="stylesheet">
		
		<!-- The icon beside the title on the website's tab on the browser, change directory accordingly.-->
		<link rel="apple-touch-icon" sizes="180x180" href="images/favicon_io/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon_io/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon_io/favicon-16x16.png">
		<link rel="manifest" href="images/favicon_io/site.webmanifest">

		<!-- Fonts (Bebas Neue, Oswald) -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@600&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="assets/css/login.css" />
		<link rel="stylesheet" href="assets/css/forgot.css" />
	</head>
	

	<body>
		
		<center>
			<img src="images/logoNoBG.png" class="forgot-img">

			<!--  Forgot Password -->
			<div class="form-box forgot-formBox">
				<h2>Forgot Password</h2><br>
				<p>Enter your email and we'll send you a <wbr>link to reset your password.</p>
				<form action="indexcheck.php" method="post">

					<div class="input-box">
						<span class="icon">
							<ion-icon name="mail"></ion-icon>
						</span>
						<input type="email" id="eMail" name="email3" placeholder="Email" style="font-family: Oswald; letter-spacing: 1px;" required>
					</div>

					<div>
						<button type="submit" name="forgotSubmit" value="submit" class="btn">Submit</button>
					</div>

				</form>
				<p>Already have an account? <a href="index.php" class="login-link">Login</a></p>
			</div>
		</center>
		
		<!-- Popup does not work here, I do not have the time to fix this. -->
		
		<script src="assets/js/login.js"></script>
		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	</body>

</html>

<?php
	session_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';
	
	$conn = mysqli_connect("localhost", "root", "", "ydpbms");
	if ($conn->connect_error) {
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
	else {
		$q = $_REQUEST["q"]; // password/feedback
		$r = $_REQUEST["r"]; // type
		
		// Account Creation
		if ($r == "Account Creation") {
			$stmt = $conn->prepare("select * from requests where type = 'Account Creation' and status = 'ongoing' limit 1");
			$stmt->execute();
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows > 0) {
				$row = $stmt_result -> fetch_assoc();
				$stmt = $conn->prepare("insert into users(fname, lname, grade, section, email, password, isAdmin) values(?, ?, ?, ?, ?, ?, false)");
				$stmt->bind_param("ssisss", $row["fname"], $row["lname"], $row["grade"], $row["section"], $row["email"], $q);
				$stmt->execute();
				echo "<script>alert('Request is successful');</script>";
			}
			$stmt = $conn->prepare("update requests set status = 'finished', result = 'accepted' where type = 'Account Creation' and status = 'ongoing' and email = ?");
			$stmt -> bind_param("s", $row["email"]);
			$stmt->execute();
			
			// PHPMailer
			
			$mail = new PHPMailer(true);
				
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'noreply.ybms@gmail.com'; // gmail
			$mail->Password = 'bwvaxbomdgfbqhkm'; // gmail app password for noreply.ybms@gmail.com
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			
			$mail->setFrom('noreply.ybms@gmail.com');
			
			$mail->addAddress($row["email"]);
			
			$mail->isHTML(true);
			
			$mail->Subject = 'YBMS - Account Creation';
			
			$mail->Body = 'Your temporary password is: '.$q.'
			<br>We advise you to change your password upon login by going into the User Profile tab and clicking on the edit button that will show there.
			<br>We hope you enjoy your experience using the Yverdon Book Management System, thank you!
			<br><br>Note: This email is auto-generated.';
			
			$mail->send(); 
			
		}
		if ($r == "Feedback") {
			$stmt = $conn->prepare("insert into feedback(email, message) values(?, ?)");
			$stmt->bind_param("ss", $_SESSION["userEmail"], $q);
			$stmt->execute();
			echo "<script>alert('Feedback sent!');</script>";
			
			/*
			
			// phpmailer code

			$mail = new PHPMailer(true);
				
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'officialyverdondepestalozzibms@gmail.com'; // gmail
			$mail->Password = 'hjzhfkmrmgnjbpqz'; // gmail app password for officialyverdondepestalozzibms@gmail.com
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			
			$mail->setFrom('officialyverdondepestalozzibms@gmail.com');
			
			$mail->addAddress('officialyverdondepestalozzibms@gmail.com');
			
			$mail->isHTML(true);
			
			$mail->Subject = 'Yverdon De Pestalozzi School - Book Management System - Feedback';
			
			$mail->Body = $q.
			'<br><br>This feedback is from '.$_SESSION["userEmail"].
			'<br>Note: This email is auto-generated. Do not reply to this account. Do not click any links sent by this account (if any appear).';
			
			$mail->send(); 
			
			*/
		}
	}
	$conn -> close();
?>
<?php
	session_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';
	
	$conn = mysqli_connect("fdb1028.awardspace.net", "4299657_ydpbmsdatabase", "Yv3rd0nD3P3st@l0zz1", "4299657_ydpbmsdatabase");
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
		}
		if ($r == "Feedback") {
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
		}
		echo $q." | ".$r;
	}
	$conn -> close();
?>
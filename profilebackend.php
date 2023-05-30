<?php

	session_start();

	// Profile
	
	$conn = mysqli_connect("localhost", "root", "", "ydpbms");
	if ($conn -> connect_error) {
		die("Connection failed:". $conn -> connect_error);
	}
	else {
		$q = $_REQUEST["q"];
		if(isset($_REQUEST["s"])) {
			if ($q == "displayName") {
				$stmt = $conn -> prepare("select * from users where email = ?");
				$stmt -> bind_param("s", $_SESSION["userEmail"]);
				$stmt -> execute();
				$result = $stmt -> get_result();
				$row = $result -> fetch_assoc();
				echo "<h2 id='displayName' value='fname'>Welcome ".$row["fname"]."!</h2>";
			}
			else if ($q == "password") {
				$y = "";
				$stmt = $conn -> prepare("select * from users where email = ?");
				$stmt -> bind_param("s", $_SESSION["userEmail"]);
				$stmt -> execute();
				$result = $stmt -> get_result();
				$row = $result -> fetch_assoc();
				for($x = 0; $x < strlen($row["password"]); $x++) { $y .= "*"; }
				echo $y;
			}
			else {
				$stmt = $conn -> prepare("select * from users where email = ?");
				$stmt -> bind_param("s", $_SESSION["userEmail"]);
				$stmt -> execute();
				$result = $stmt -> get_result();
				$row = $result -> fetch_assoc();
				echo $row[$q];
			}
		}
		else {
			$r = $_REQUEST["r"];
			if ($q == "displayName") { exit(0); }
			$stmt = $conn -> prepare("update users set ".$q." = ? where email = ?");
			$stmt -> bind_param("ss", $r, $_SESSION["userEmail"]);
			$stmt -> execute();
		}
	}
	
	$conn -> close();
?>
<?php

	// Books.html Search Tool

	// Array with names
	$a = array();
	$conn = mysqli_connect("localhost", "root", "", "ydpbms");
	if ($conn -> connect_error) {
		die("Connection failed:". $conn -> connect_error);
	}
	$sql = "select name from books";
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		while ($row = $result -> fetch_assoc()) {
			$a[] = $row["name"]; // $row must have a specified identifier to avoid nested array/system error
		}
	} else {
		exit;
	}

	// get the r parameter from URL
	$q = $_REQUEST["q"];

	$hint = "";

	// lookup all hints from array if $q is different from ""
	if ($q !== "") {
		$q = strtolower($q);
		$len = strlen($q);
		$matchcheck = false;
		foreach($a as $name) {
			if (stristr($q, substr($name, 0, $len))) {
				$matchcheck = true;
				$stmt = $conn->prepare("select * from books where name = ?");
				$stmt->bind_param("s", $name);
				$stmt->execute();
				$stmt_result = $stmt->get_result();
				$row2 = $stmt_result->fetch_assoc();
				echo '<div class="col-4 col-12-small">
						<section class="box">
							<a href="#" class="image featured"><img src="images/pic06.jpg" alt="image" /></a>
							<header>
								<h2>Title: '.$row2["name"].'</h2>
							</header>
							<a href="#" class="button style1">More</a>
						</section>
					</div>';
			}
		}
		if($matchcheck == false) {
			// if nothing matches
			echo '<div class="col-4 col-12-small">
					<section class="box">
						<a href="#" class="image featured"><img src="images/pic06.jpg" alt="image" /></a>
						<header>
							<h2>No content here, sorry!</h2>
						</header>
					</section>
				</div>';
		}
	}
	// default display
	else {
		foreach($a as $name) {
			$stmt = $conn->prepare("select * from books where name = ?");
			$stmt->bind_param("s", $name);
			$stmt->execute();
			$stmt_result = $stmt->get_result();
			$row2 = $stmt_result->fetch_assoc();
			echo '<div class="col-4 col-12-small">
					<section class="box">
						<a href="#" class="image featured"><img src="images/pic06.jpg" alt="image" /></a>
						<header>
							<h2>Title: '.$row2["name"].'</h2>
						</header>
						<a href="#" class="button style1">More</a>
					</section>
				</div>';
		}
	}
	
	$conn -> close();	
	
?>
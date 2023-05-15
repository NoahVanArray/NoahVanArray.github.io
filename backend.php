<?php

	// Books.html Search Tool

	// Array with names
	$a = array();
	$conn = mysqli_connect("fdb1028.awardspace.net", "3306", "Yv3rd0nD3P3st@l0zz1", "4299657_ydpbmsdatabase");
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

	// get the q & r parameters from URL
	$q = $_REQUEST["q"];
	$r = $_REQUEST["r"];
	$s = $_REQUEST["s"];

	// lookup all hints from array if $q is different from ""
	if ($q !== "") {
		$q = "%".strtolower($q)."%";
		$matchcheck = false;
		
		// decipher sorting variables (no better woraround than nested if statements due to PHP limitations, I've checked)
		if ($s == "desc") {
			if ($r == "name") { $stmt = $conn->prepare("select * from books where name like ? order by name desc"); }
			if ($r == "id") { $stmt = $conn->prepare("select * from books where name like ? order by id desc"); }
			if ($r == "author") { $stmt = $conn->prepare("select * from books where name like ? order by author desc"); }
		}
		else {
			if ($r == "name") { $stmt = $conn->prepare("select * from books where name like ? order by name asc"); }
			if ($r == "id") { $stmt = $conn->prepare("select * from books where name like ? order by id asc"); }
			if ($r == "author") { $stmt = $conn->prepare("select * from books where name like ? order by author asc"); }			
		}
		
		$stmt->bind_param("s", $q);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		
		while ($row = $stmt_result->fetch_assoc()) {
			$matchcheck = true;
			echo '
				<div class="col-4 col-12-small">
					<section class="box books">
						<img src="'.$row["imgUrl"].'" alt="" class="image featured" style="margin-bottom: 1em;" />
						<center>
							<header>
								<h2 style="margin: 0 0 -10px 0; color: #484d55;">'.$row["name"].'</h2>
							</header>
							<a href="'.$row["siteUrl"].'" class="button style1" style="margin-bottom: 20px;">More</a>
						</center>
					</section>
				</div>
			';
		}
		
		if($matchcheck == false) {
			// if nothing matches
			echo '
				<div class="col-4 col-12-small">
					<section class="box books">
						<img src="images/pic06.jpg" alt="" class="image featured" style="margin-bottom: 1em;" />
						<center>
							<header>
								<h2 style="margin: 0 0 -10px 0; color: #484d55;">No content here, sorry!</h2>
							</header>
						</center>
					</section>
				</div>
			';
		}
		
	}
	else {
		// default display
		
		// decipher sorting variables (no better woraround than nested if statements due to PHP limitations, I've checked extensively)
		if ($s == "desc") {
			if ($r == "name") { $stmt = $conn->prepare("select * from books order by name desc"); }
			if ($r == "id") { $stmt = $conn->prepare("select * from books order by id desc"); }
			if ($r == "author") { $stmt = $conn->prepare("select * from books order by author desc"); }
		}
		else {
			if ($r == "name") { $stmt = $conn->prepare("select * from books order by name asc"); }
			if ($r == "id") { $stmt = $conn->prepare("select * from books order by id asc"); }
			if ($r == "author") { $stmt = $conn->prepare("select * from books order by author asc"); }			
		}
		
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		while ($row = $stmt_result->fetch_assoc()) {
				echo '
					<div class="col-4 col-12-small">
						<section class="box books">
							<img src="'.$row["imgUrl"].'" alt="" class="image featured" style="margin-bottom: 1em;" />
							<center>
								<header>
									<h2 style="margin: 0 0 -10px 0; color: #484d55;">'.$row["name"].'</h2>
								</header>
								<a href="'.$row["siteUrl"].'" class="button style1" style="margin-bottom: 20px;">More</a>
							</center>
						</section>
					</div>
				';
		}
	}
	
	$conn -> close();	
	
?>
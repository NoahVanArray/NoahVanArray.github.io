<?php
	
	session_start();

	// Admin Search and Sort Tool

	// get the q & r parameters from URL
	$q = $_REQUEST["q"]; // search bar value
	$r = $_REQUEST["r"]; // priority
	$s = $_REQUEST["s"]; // order
	$t = (int)$_REQUEST["t"]; // page offset
	$u = $_REQUEST["u"]; // page offset type (first, change, last, set)
	$v = $_REQUEST["v"]; // table
	$page = (int)$_REQUEST["page"] - 1; // page

	// Array with names
	$a = array();
	$conn = mysqli_connect("localhost", "root", "", "ydpbms");
	if ($conn -> connect_error) {
		die("Connection failed:". $conn -> connect_error);
	}
	$sql = "select * from ".$v;
	$result = $conn -> query($sql);
	if ($result -> num_rows > 0) {
		while ($row = $result -> fetch_assoc()) {
			$a[] = $row["id"]; // $row must have a specified identifier to avoid nested array/system error
		}
	}
	else {
		exit;
	}
	
	if ($u == "first") { $page = 0; }
	else if ($u == "last") { $page = $result -> num_rows - 1; }
	else if ($u == "change") { $page += $t; if ($page > ($result -> num_rows - 1) || $page < 0) { $page -= $t; } }
	else if ($u == "set") { $page = $t - 1; }
	else if (!isset($u)) { $page = 0; }

	$x = "";
	
	
	// lookup all hints from array if $q is different from "" 
	// if there is searching
	
	if ($q !== "") {
		$q = "'%".strtolower($q)."%'";
		$matchcheck = false;
		
		$query = "select * from ".$v." where name like ".$q." order by ".$r." ".$s." limit 10 offset ".$page;
		$query2 = "select * from ".$v." where name like ".$q;
		$result = $conn -> query($query);
		$result2 = $conn -> query($query2);
		
		$page1 = $page + 1;
		$page10 = $page + 11;
		$limit = $result2 -> num_rows;
		if ($page10 > $limit) { $page10 = $limit; }
		if ($page > ($result2 -> num_rows - 1) || $page < 0 || $page1 >= $limit) { $page = 0; $page1 = $page + 1; }
		$queue = '<span style="display: inline;">Displaying '.$page1.' to '.$page10.' of '.$limit.' queries</span>';
		echo '
			<tr>
				<th colspan="9">'.$queue.'</th>
			</tr>
			<tr>
				<th>ID</th>
				<th width="30%">Title</th>
				<th>Stock</th>
				<th width="20%">Author</th>
				<th width="20%">Publisher</th>
				<th width="15%">Category</th>
				<th width="15%">Genre/s</th>
				<th>Year</th>
				<th>Select</th>
			</tr>
		';
		
		while ($row = $result->fetch_assoc()) {
			$matchcheck = true;
			if ($row["stock"] < 1) { $x = "red; color: white"; }
			else { $x = "lime"; }
			echo '
				<tr>
					<td>'.$row["id"].'</td>
					<td>'.$row["name"].'<a href="adminMore.php?select='.$row["name"].'" style="text-decoration: none;"><ion-icon name="link-outline"></ion-icon></a></td>
					<td style="background-color: '.$x.';">'.$row["stock"].'</td>
					<td>'.$row["author"].'</td>
					<td>'.$row["publisher"].'</td>
					<td>'.$row["category"].'</td>
					<td>'.$row["genre"].'</td>
					<td>'.$row["originyear"].'</td>
					<td><button class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" value="bookInfo" onclick="onDisplay(this.value)">Select</button></td>
				</tr>
			';
		}
		
		if($matchcheck == false) {
			// if nothing matches
			echo '
				<tr>
					<td>_</td>
					<td>Unfortunately, there is no content here.</td>
					<td>_</td>
					<td>_</td>
					<td>_</td>
					<td>_</td>
					<td>_</td>
					<td>_</td>
					<td>_</td>
				</tr>
			';
		}
		
	}
	else {
		// default display
		
		$page1 = $page + 1;
		$page10 = $page + 11;
		$limit = $result -> num_rows;
		if ($page10 > $limit) { $page10 = $limit; }
		if ($page > ($result -> num_rows - 1) || $page < 0) { $page = 0; $page1 = $page + 1; }
		$queue = '<span style="display: inline;">Displaying '.$page1.' to '.$page10.' of '.$limit.' queries</span>';
		
		echo '
			<tr>
				<th colspan="9">'.$queue.'</th>
			</tr>
			<tr>
				<th>ID</th>
				<th width="30%">Title</th>
				<th>Stock</th>
				<th width="20%">Author</th>
				<th width="20%">Publisher</th>
				<th width="15%">Category</th>
				<th width="15%">Genre/s</th>
				<th>Year</th>
				<th>Select</th>
			</tr>
		';
		
		$query = "select * from ".$v." order by ".$r." ".$s." limit 10 offset ".$page;
		$result = $conn -> query($query);
		while ($row = $result->fetch_assoc()) {
			if ($row["stock"] < 1) { $x = "red; color: white"; }
			else { $x = "lime"; }
			echo '
				<tr>
					<td>'.$row["id"].'</td>
					<td>'.$row["name"].'<a href="adminMore.php?select='.$row["name"].'" style="text-decoration: none;"><ion-icon name="link-outline"></ion-icon></a></td>
					<td style="background-color: '.$x.';">'.$row["stock"].'</td>
					<td>'.$row["author"].'</td>
					<td>'.$row["publisher"].'</td>
					<td>'.$row["category"].'</td>
					<td>'.$row["genre"].'</td>
					<td>'.$row["originyear"].'</td>
					<td><button class="button style3" style="height: 25px; line-height: 2.5; min-width: 0; width: 62px; font-size: 0.7em;" value="bookInfo" onclick="onDisplay(this.value)">Select</button></td>
				</tr>
			';
		}
	}
	
	$page += 1;
	echo '<p style="display: none;" id="pageNew">'.$page.'</p>';
	
	$conn -> close();	
?>
<?php

	session_start();

	// Add Book
	
	if (isset($_POST['upload'])) { 
		$name = $_POST['name'];
		$author = $_POST['author'];
		$publisher = $_POST['publisher'];
		$genre = $_POST['genre'];
		$stock = $_POST['stock'];
		$year = $_POST['year'];
		$category = $_POST['category'];
		$desc = $_POST['desc'];
		
		$image = $_FILES['image']['name'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$folder = "../images/covers/".$image;
		move_uploaded_file($tmp_name, $folder);
		$folder = "images/covers/".$image;
		
		$conn = mysqli_connect("localhost", "root", "", "ydpbms");
		if ($conn->connect_error) {
			echo "$conn->connect_error";
			die("Connection Failed : ". $conn -> connect_error);
		}
		else {
			$sql = "insert into books (name, category, genre, stock, author, publisher, description, originyear, imgUrl) values ('".$name."', '".$category."', '".$genre."', ".$stock.", '".$author."', '".$publisher."', '".$desc."', '".$year."', '".$folder."')";
			if($conn -> query($sql)) {
				echo "Data inserted";
			}
			else {
				echo "Data failed to insert";
			}
			exit;
		}
	}

?>
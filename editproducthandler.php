<?php
	$errorMessage = "";	
	echo "Hai";

		if (empty($_POST["name"]) || empty($_POST["description"]) || empty($_POST["price"])) {
			$errorMessage = "All field must be filled";
		} else 
		echo "Hai2";
		{

			$pid = $_GET["pid"]; 
			$username = $_GET['username'];
			$connection = mysqli_connect("localhost", "root", "", "saleproject");
				$name = $_POST["name"];
				$desc = $_POST["desc"];
				$price = $_POST["price"];
				
			

			$kueri = "UPDATE product 
			SET productname = '$name', description = '$desc', price = '$price'
			WHERE productid = $pid ";


			if (mysqli_query($connection, $kueri)) {
			    echo "New record created successfully";
			} else {
				echo "still not right";
			}
			$connection->close();
		}
	header('location: yourproduct.php'.'?user='.$username);
?>
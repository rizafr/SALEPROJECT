<?php
	$errorMessage = "";	
	echo "Hai";

		if (empty($_POST["name"]) || empty($_POST["description"]) || empty($_POST["price"])) {
			$errorMessage = "All field must be filled";
		} else 
		echo "Hai2";
		{
			$pid = $_GET["pid"]; 
			$username = $_GET["user"];
			$connection = mysqli_connect("localhost", "root", "", "saleproject");
			$kueri = "DELETE FROM product 
			WHERE productid = $pid";
			if (mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=0")) {
			    echo "0";
			} else {
				echo "HAHA";
			}

			if (mysqli_query($connection, $kueri)) {
			    echo "New record created successfully";
			} else {
				echo "still not right";
			}
			if (mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=1")) {
			    echo "0";
			} else {
				echo "HAHA";
			}


			$connection->close();
		}
	header('location: yourproduct.php'.'?user='.$username);
?>
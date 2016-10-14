


<?php
	if (empty($_GET['username']) || empty($_GET['password'])) {
		header("location: index.php");
	}
	else
	{
		// Define $username and $password
		$username=$_GET['username'];
		$password=$_GET['password'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysqli_connect("localhost", "root","", "saleproject");
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		// Selecting Database
		// $db = mysql_select_db("saleproject", $connection);
		// SQL query to fetch information of registerd users and finds user match.
		// $query = mysql_query("select * from user where password='$password' AND username='$username'", $connection);
		// $rows = mysql_num_rows($query);
		
		if ($result = $connection->query(("select * from user where password='$password' AND username='$username'"))) {
			$rows = $result->num_rows;
			if ($rows == 1) {
				header("location: catalog.php?user=$username"); // Redirecting To Other Page
			} else {
				if ($result = $connection->query(("select * from user where password='$password' AND email='$username'"))) {
					$rows = $result->num_rows;
					if ($rows == 1) {
						while($row = $result->fetch_assoc()) {
				        	$username = $row["username"];
				     	}
						header("location: catalog.php?user=$username"); // Redirecting To Other Page
					} else {
						
			}
		}
			}
		}

	}
?>

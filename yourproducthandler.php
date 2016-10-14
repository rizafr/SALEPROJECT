<?php
    $username = $_GET["user"];
	$connection = mysqli_connect("localhost", "root", "", "saleproject");
	$sql = "select productname, description, price, photo, add_date, productid, likeamount from product natural join user where username ='$username'";
	$result = $connection->query($sql);
	$i = 0;
    $name = array();
	if ($result->num_rows > 0) {
     // output data of each row
    	while($row = $result->fetch_assoc()) {
        	$name[$i] = $row["productname"];
        	$desc[$i] = $row["description"];
        	$price[$i] = $row["price"];
        	$photo[$i] = $row["photo"];
            $datetime[$i] = $row["add_date"];
            $productid[$i] = $row["productid"];
            $like[$i] = $row["likeamount"];
        	$i++;
     	}
	} else {
    	$errMsg = "no file";
	}


	$connection->close();

?>
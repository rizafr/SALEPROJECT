<?php
	$connection = mysqli_connect("localhost", "root", "", "saleproject");
    $username = $_GET["user"];
	$sql = "select photo, productname, price, qty, username_seller, consignee, address, postalcode, phonenumber,purchasetime from product natural join purchase where username_buyer='$username'";
	$result = $connection->query($sql);
	$i = 0;
	if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $photo[$i] = $row["photo"];
         $productname[$i] = $row["productname"];
         $price[$i] = $row["price"];
         $qty[$i] = $row["qty"];
         $seller[$i] = $row["username_seller"];
         $consignee[$i] = $row["consignee"];
         $address[$i] = $row["address"];
         $postalcode[$i] = $row["postalcode"];
         $phone[$i] = $row["phonenumber"];
         $datetime[$i] = $row["purchasetime"];
         $i++;
     }
} else {
     $errMsg = "no file";
}


$connection->close();
?>
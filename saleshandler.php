<?php
    $username = $_GET["user"];
	$connection = mysqli_connect("localhost", "root", "", "saleproject");
	$sql = "select photo, productname, price, qty, username_buyer, consignee, address, postalcode, phonenumber, purchasetime from product natural join purchase where username_seller='$username'";
	$result = $connection->query($sql);
	$i = 0;
	if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         $photo[$i] = $row["photo"];
         $productname[$i] = $row["productname"];
         $price[$i] = $row["price"];
         $qty[$i] = $row["qty"];
         $buyer[$i] = $row["username_buyer"];
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
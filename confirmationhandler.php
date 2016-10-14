<?php


	$connection = mysqli_connect("localhost", "root", "", "saleproject");
  $username = $_GET["user"];
  $product = $_GET["produk"];
	$sql = "select * from product where productid = $product";
	$result = $connection->query($sql);
	if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
		$name = $row["productname"];
		$price = $row["price"];
     }
 }

 	$sql2 = "select fullname, address, postalcode, phonenumber from user where username = '$username'";
	$result2 = $connection->query($sql2);
	if ($result2->num_rows > 0) {
     // output data of each row
     while($row2 = $result2->fetch_assoc()) {
		$name_user = $row2["fullname"];
		$add = $row2["address"];
		$code = $row2["postalcode"];
		$phone = $row2["phonenumber"];
     }
 }



 if ( isset($_POST['confirm']) ) {

    if (empty($_POST["consignee"]) || empty($_POST["address"]) || empty($_POST["postalcode"]) || empty($_POST["phonenumber"]) || empty($_POST["creditcard"]) || empty($_POST["verification"])) {

      //$errorMessage = "All field must be filled";
      
    }
    else{
  
  // clean user inputs to prevent sql injections
  $consignee = trim($_POST['consignee']);
  $consignee = strip_tags($consignee);
  $consignee = htmlspecialchars($consignee);

  $address  = trim($_POST['address']);
  $address  = strip_tags($address);
  $address = htmlspecialchars($address);
  
  $postalcode = trim($_POST['postalcode']);
  $postalcode = strip_tags($postalcode);
  $postalcode = htmlspecialchars($postalcode);
  
  $phonenumber = trim($_POST['phonenumber']);
  $phonenumber = strip_tags($phonenumber);
  $phonenumber = htmlspecialchars($phonenumber);
  
  $creditcard = trim($_POST['creditcard']);
  $creditcard = strip_tags($creditcard);
  $creditcard = htmlspecialchars($creditcard);
  
  $verification = trim($_POST['verification']);
  $verification = strip_tags($verification);
  $verification = htmlspecialchars($verification);

  $qty = trim($_POST['qty']);
  $qty = strip_tags($qty);
  $qty = htmlspecialchars($qty);

  
   $query = "insert into purchase(consignee,address,postalcode,phonenumber,creditnumber,verif, qty, purchasetime) values ('$consignee', '$address' ,'$postalcode' ,'$phonenumber','$creditcard','$verification', '$qty',now())";

   if (mysqli_query($connection, $query)) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
  
    header("location: purchases.php"."?user=$username"); // Redirecting To Other Page
    # unset($fullname);
    # unset($username);
    # unset($email);
    # unset($password);
    # unset($address);
    # unset($postalcode);
    # unset($phonenumber);
   } 
 }
}


	$connection->close();
?>
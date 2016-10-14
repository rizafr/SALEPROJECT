<?php
 
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysqli_connect("localhost","root","","saleproject");
		
		
	// Selecting Database
$errMSG="";
 $error = false;

 if ( isset($_POST['submit']) ) {
  
  // clean user inputs to prevent sql injections
  $fullname = trim($_POST['fullname']);
  $fullname = strip_tags($fullname);
  $fullname = htmlspecialchars($fullname);

  $username  = trim($_POST['username']);
  $username  = strip_tags($username);
  $username = htmlspecialchars($username);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $password = trim($_POST['password']);
  $password = strip_tags($password);
  $password = htmlspecialchars($password);
  
  $conpassword = trim($_POST['conpassword']);
  $conpassword = strip_tags($conpassword);
  $conpassword = htmlspecialchars($conpassword);
  
  $address = trim($_POST['address']);
  $address = strip_tags($address);
  $address = htmlspecialchars($address);
  
  $postalcode = trim($_POST['postalcode']);
  $postalcode = strip_tags($postalcode);
  $postalcode = htmlspecialchars($postalcode);
  
  $phone = trim($_POST['phone']);
  $phone = strip_tags($phone);
  $phone = htmlspecialchars($phone);
  
  
  
 
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;   
   $emailError = "Please enter valid email address.";
  } else {
	   // check email exist or not
    if ($result = $connection->query("SELECT email FROM user WHERE email	='$email'")) {
          $count = $result->num_rows;

             if($count!=0){
                  $error = true;   
                  $emailError = "Provided Email is already in use.";
      }
   }
  }
  // password encrypt using SHA256();
  //$password = hash('sha256', $pass);
  
  // if there's no error, continue to signup

  if( !$error ) {

    $query = "insert into user(fullname,username,email,password,address,postalcode,phonenumber) values ('$fullname', '$username' ,'$email' ,'$password','$address','$postalcode','$phone')";

   if (mysqli_query($connection, $query)) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    header("location: index.php"); // Redirecting To Other Page
    # unset($fullname);
    # unset($username);
    # unset($email);
    # unset($password);
    # unset($address);
    # unset($postalcode);
    # unset($phonenumber);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  
  
 }
?>

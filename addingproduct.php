<?php
	//include 'library/config.php';
	//include 'library/opendb.php';


	$errorMessage = "";	

	$username = $_GET["user"];
	if (isset($_POST['submit'])){
		if (empty($_POST["name"]) || empty($_POST["description"]) || empty($_POST["price"])) {

			//$errorMessage = "All field must be filled";
			
		} else 
		{
			$errorMessage = "";	
			$connection = mysqli_connect("localhost", "root", "", "saleproject");
				$name = $_POST["name"];
				$desc = $_POST["description"];
				$price = $_POST["price"];
			
			$target_dir = "uploads/";
			$photo_name = basename($_FILES["foto"]["name"]);
			//	echo $photo_name;
			$target_file = $target_dir . $photo_name;

			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["foto"]["tmp_name"]);
			    if($check !== false) {
			    //    echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			    //    echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    //echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["foto"]["size"] > 5000000) {
			    //echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
			    } else {
			    }
			}
			

			$kueri = "INSERT INTO 
			product (username, description, productname, price, photo, photo_name)
			VALUES ('$username', '$desc', '$name', $price,'$target_file','$photo_name')";


			if (mysqli_query($connection, $kueri)) {
				//header("location: yourproduct.php?user=$username");
			} else {
			}
			$connection->close();
		}

		//header()	
	}
?>		

<html>
		<?php $username = $_GET["user"]?>
	<head>
	  <title>PHP Test</title>	  
	  <link rel="stylesheet" type="text/css" href="style.css">
	 </head>
	 <body>
			 <div class="top-box">				 
			 <h1><span class="red">Sale</span><span class="blue">Project</span></h1>
			</div>

			<div class="addproduct-box">
				<label for="hi">Hi, <?php echo $username ?></label>
				<a href="logout.php"><label for="logout"><span class="red">logout</label></a><br>

			 	<div class="navbar">
					<ul class= nav>
						<?php $username=$_GET["user"];?>
			 			<li><a href=<?php echo "catalog.php?"."user=$username"; ?> >Catalog</a></li>
			  			<li><a href=<?php echo "yourproduct.php?"."user=$username"; ?> >Your Products</a></li>
			  			<li><a href=<?php echo "addproduct.php?"."user=$username"; ?> >Add Product</a></li>
			  			<li><a href=<?php echo "sales.php?"."user=$username"; ?> >Sales</a></li>
			  			<li><a href=<?php echo "purchases.php?"."user=$username"; ?> >Purchase</a></li>
					</ul>
				</div>

				<h2>Please add your product here</h2>
				<hr>

				<?php
					$pid = $_GET['pid'];
					$connection = mysqli_connect("localhost", "root", "", "saleproject");
					$sql = "select productname, description, price, photo from product where productid=". $pid;
					$result = $connection->query($sql);
					$i = 0;
					if ($result->num_rows > 0) {
				     // output data of each row
				    	while($row = $result->fetch_assoc()) {
				        	$name = $row["productname"];
				        	$desc = $row["description"];
				        	$price = $row["price"];
				        	$photo = $row["photo"];
				     	}
					} else {
				    	$errMsg = "no file";
					}


					$connection->close();


				?>
				<form action= <?php echo "editproducthandler.php?pid=$pid&username=$username" ?> method="post">
					<label for="name">Name</label>
					<input id="name" type="text" name="name" value=<?php echo $name;?> ><br>
					<label for="description">Description(max 200 chars)</label>
					<textarea id = description name = "desc" ><?php echo $desc;?></textarea>

					<label for="price">Price</label>
					<input id="price" type="text" name="price" value=<?php echo $price;?>><br>

					<label for="photo">Photo</label>
					<input name="foto" type="file" value="Choose file" id = "choosefile" value=<?php echo $photo;?>/> 
					<br />
					<br />		
					<input style = "float:right" class ="confirm-purchase" type="submit" value="CHANGE" />
					<br><br>
				</form>
					<a style = "float:right" href= <?php echo "yourproduct.php?user=$username"; ?> ><input class ="confirm-purchase" type="submit"  value="CANCEL" /></a>	
					
			</div>

	 </body>

</html>



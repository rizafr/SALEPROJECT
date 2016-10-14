<?php
include('addingproduct.php'); // Includes Login Script

?>
<html>
	<head>
	  <title>PHP Test</title>	  
	  <link rel="stylesheet" type="text/css" href="style.css">

	  <script type="text/javascript">
		   <!--
		   				      // Form validation code will come here.
		      function validate()
		      {
		      	
		      	if( document.productform.name.value == "" )
		         {
		            alert( "Please insert name!" );
		            document.productform.name.focus() ;
		            return false;
		         }

		         if( document.productform.description.value == "" )
		         {
		            alert( "Please insert description!" );
		            document.productform.description.focus() ;
		            return false;
		         }

		         if ( document.productform.description.value.length > 200){
		         	alert( "You only can insert 200 characters!" );
		            document.productform.description.focus() ;
		            return false;
		         }

		         if( document.productform.price.value == "" || isNaN(document.productform.price.value) )
		         {
		            alert( "Please insert correct Price!" );
		            document.productform.price.focus() ;
		            return false;
		         }
    				
    				if( document.productform.photo.value == "" )
		         {
		            alert( "Please insert description!" );
		            document.productform.photo.focus() ;
		            return false;
		         }
		         
		         
		         return( true );
		      }
		   //-->
		</script>
	 </head>
	 <body>
			 <div class="top-box">				 
			 <h1><span class="red">Sale</span><span class="blue">Project</span></h1>
			</div>

			<div class="addproduct-box">
				<label for="hi">Hi, <?php echo $username ?>!</label>
				<a href="logout.php"><label for="logout"><span class="red">logout</label></a><br>

			 	<div class="navbar">
					<ul class= nav>
			 			<li><a href=<?php echo "catalog.php?"."user=$username" ?>>Catalog</a></li>
			  			<li><a href=<?php echo "yourproduct.php?"."user=$username" ?>>Your Products</a></li>
			  			<li><a class="active">Add Product</a></li>
			  			<li><a href=<?php echo "sales.php?"."user=$username" ?>>Sales</a></li>
			  			<li><a href=<?php echo "purchases.php?"."user=$username" ?>>Purchase</a></li>
					</ul>
				</div>

				<h2>Please add your product here</h2>
				<hr>

			
				<form action="" method="post" enctype="multipart/form-data" name="productform" onsubmit="return(validate());">
					<label for="name">Name</label>
					<input id="name" type="text" name="name"><br>

					<label for="description">Description (max 200 chars)</label>
					<textarea id="description" type="text" name="description"></textarea>

					<label for="price">Price (IDR)</label>
					<input id="price" type="text" name="price"><br>

					<label for="photo">Photo</label>
					<input name="foto" type="file" value="Choose file" id = "choosefile" required/> 
					<br />
					<br />
					<input name="submit" type="submit" value="ADD" />
					<input name="cancel" type="submit" value="CANCEL" />
						</form>
				<span class="red"><?php echo $errorMessage ?></span>
			</div>

	 </body>

</html>



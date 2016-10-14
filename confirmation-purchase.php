<?php
	include("confirmationhandler.php");
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
		      
		         if( document.confForm.consignee.value == "" )
		         {
		            alert( "Please insert consignee!" );
		            document.confForm.consignee.focus() ;
		            return(false);
		         }

		         if( document.confForm.address.value == "" )
		         {
		            alert( "Please insert password!" );
		            document.confForm.address.focus() ;
		            return(false);
		         }

		         if( document.confForm.postalcode.value == "" || isNaN( document.confForm.postalcode.value ) || document.confForm.postalcode.value.length != 5 )
			         {
            		alert( "Please provide a postalcode in the format #####." );
		            document.regForm.postalcode.focus() ;
		            return(false);
		         }

		         if( document.confForm.creditcard.value == "" || isNaN( document.confForm.creditcard.value ) || document.confForm.creditcard.value.length != 12 )
			         {
            		alert( "Please insert correct Credit Card!" );
		            document.confForm.creditcard.focus() ;
		            return(false);
		         }

		         if( document.confForm.verification.value == "" || isNaN( document.confForm.verification.value ) || document.confForm.verification.value.length != 3 )
			         {
            		alert( "Please insert correct Verification Code!" );
		            document.confForm.creditcard.focus() ;
		            return(false);
		         }
		         return(true);
		      }
		   //-->
		</script>
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
			 			<li><a href=<?php echo "catalog.php?"."user=$username" ?>>Catalog</a></li>
				  		<li><a href=<?php echo "yourproduct.php?"."user=$username" ?>>Your Products</a></li>
				  		<li><a href=<?php echo "addproduct.php?"."user=$username" ?>>Add Product</a></li>
				  		<li><a href=<?php echo "sales.php?"."user=$username" ?>>Sales</a></li>
				  		<li><a href=<?php echo "purchases.php?"."user=$username" ?>>Purchase</a></li>
					</ul>
				</div>


				<div class="confirmpurchase">
				<form class = "confirmpurchase" action="" method="post" name="confForm" onsubmit="return(validate());" >
					<h2>Please confirm your purchase</h2>
					<hr>

					Products: <?php echo $name 
					?><br><br>
					Price		: IDR <?php
						echo number_format($price,0,".",".")
					?><br><br>

					Quantity	: <input id="qty" type="text" name="qty" value=1 onkeyup="hitung(this.value,<?php echo $price?>)"> pcs<br>
					Total Price	: IDR <span id="result"></span>
					<script>
					function hitung(t,r){
						var total = t * r;
						String(total).replace(/(.)(?=(\d{3})+$)/g,'$1,');
						document.getElementById("result").innerHTML = String(total).replace(/(.)(?=(\d{3})+$)/g,'$1.');
					}
					</script>
					
					<br><br>
					Delivery to :					
					<br><br>

				
					<label for="consignee">Consignee</label>
					<input id="consignee" type="text" name="consignee" value=<?php echo $name_user ?>><br>

					<label for="address">Full Address</label>
					<textarea id="address" type="text" value=<?php echo $add ?> name="address"><br></textarea>

					<label for="postalcode">Postal Code</label>
					<input id="postalcode" type="text" value=<?php echo $code ?> name="postalcode"><br>

					<label for="phonenumber">Phone Number</label>
					<input id="phonenumber" type="text" value=<?php echo $phone ?> name="phonenumber"><br>

					<label for="creditcard">12 Digits Credit Card Number</label>
					<input id="creditcard" type="text" name="creditcard"><br>

					<label for="verification">3 Digits Card Verification value</label>
					<input id="verification" type="text" name="verification"><br>

					<br> <br>
					<input class ="confirm-purchase" name="confirm" type="submit" value="CONFIRM" />

					
				</form>
					<a href= <?php echo "catalog.php?user=$username"; ?> ><input class ="confirm-purchase" type="submit"  value="CANCEL" /></a>
				</div>
			</div>

	 </body>

</html>



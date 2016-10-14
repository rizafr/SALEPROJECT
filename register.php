<?php
include('registerhandler.php'); 
?>

<html>
	<head>
	  <title>PHP Test</title>
	  
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <script type="text/javascript">
		   <!--
		   		function ValidateEmail(mail)   
			    {  
			     var emailID = document.regForm.email.value;
		         atpos = emailID.indexOf("@");
		         dotpos = emailID.lastIndexOf(".");
		         
		         if (atpos < 1 || ( dotpos - atpos < 2 )) 
		         {
		            alert("Please enter correct email ID")
		            document.regForm.email.focus() ;
		            return false;
         		}
         			return true;
			    }  
		      // Form validation code will come here.
		      function validate()
		      {
		      	
		      	if( document.regForm.fullname.value == "" )
		         {
		            alert( "Please insert fullname!" );
		            document.regForm.fullname.focus() ;
		            return false;
		         }

		         if( document.regForm.username.value == "" )
		         {
		            alert( "Please insert username!" );
		            document.regForm.username.focus() ;
		            return false;
		         }
    
		         if( document.regForm.email.value == ""  )
		         {
		            alert( "Please insert email!" );
		            document.regForm.email.focus() ;
		            return false;
		         }

		          if (!(ValidateEmail(document.regForm.email.value)))
		          {
		            document.regForm.email.focus() ;
		            return false;
		          }

		         if( document.regForm.password.value == "" )
		         {
		            alert( "Please insert password!" );
		            document.regForm.password.focus() ;
		            return false;
		         }

		         if( document.regForm.conpassword.value == "" )
		         {
		            alert( "Please insert password!" );
		            document.regForm.conpassword.focus() ;
		            return false;
		         }

		         if( document.regForm.address.value == "" )
		         {
		            alert( "Please insert address!" );
		            document.regForm.address.focus() ;
		            return false;
		         }

		         if( document.regForm.postalcode.value == "" || isNaN( document.regForm.postalcode.value ) || document.regForm.postalcode.value.length != 5 )
			         {
            		alert( "Please provide a postalcode in the format #####." );
		            document.regForm.postalcode.focus() ;
		            return false;
		         }

		         if( document.regForm.phone.value == "" )
		         {
		            alert( "Please insert Phone!" );
		            document.regForm.phone.focus() ;
		            return false;
		         }
		         
		         return( true );
		      }
		   //-->
		</script>
	 </head>
	 <body>
			<div class="register-box">
				 
		 <h1><span class="red">Sale</span><span class="blue">Project</span></h1>
				 <h2>Please Register</h2>
				 <hr>
			 <form action="" method="post" name="regForm" onsubmit="return(validate());">
				<strong><label for="Fullname">Full Name</label></strong>
				<input id="fullname" type="text" name="fullname"><br>
				<strong><label for="username">Username</label></strong>
				<input id="username" type="text" name="username"><br>

				<strong><label for="email">E-mail</label></strong>
				<input id="email" type="text" name="email"><br/>
				<strong><label for="password">Password</label></strong>
				<input id="password" type="password" name="password"><br>


				<strong><label for="conpassword">Confirm Password</label></strong>
				<input id="conpassword" type="password" name="conpassword"><br>

				<strong><label for="address">Full Address</label></strong>
				<input id="address" type="text" name="address"><br>

				<strong><label for="postalcode">Postal Code</label></strong>
				<input id="postalcode" type="text" name="postalcode"><br>

				<strong><label for="phone">Phone Number</label></strong>
				<input id="phone" type="text" name="phone"><br>

				<input class="register-btn" name="submit" type="submit" value="REGISTER" />
			</form>
			
			<br/>
			<br/>
			<strong><p class = "treb">Already registered? Login <a href="index.php">here</a></p></strong>
			 <?php echo $errMSG; ?> 
			</div>
	 </body>

</html>

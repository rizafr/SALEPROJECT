

<html>
	<head>
	  <title>PHP Test</title>
	  
	  <link rel="stylesheet" type="text/css" href="style.css">

	  <script type="text/javascript">
		      function validate()
		      {
		      
		         if( document.loginForm.username.value == "" )
		         {
		            alert( "Please insert email or username!" );
		            document.loginForm.username.focus() ;
		            return false;
		         }

		         if( document.loginForm.password.value == "" )
		         {
		            alert( "Please insert password!" );
		            document.loginForm.password.focus() ;
		            return false;
		         }
		         
		         return( true );
		      }
		</script>

	 </head>
	 <body>
			 <div class="login-box">
				 
		 <h1><span class="red">Sale</span><span class="blue">Project</span></h1>
				 <h2>Please login</h2>
				 <hr>
				<form action="login.php" method="GET" name="loginForm" onsubmit="return(validate());">
					<label>Email or Username</label>
					<input id="username" name="username" type="text">
					<label>Password</label>
					<input id="password" name="password" type="password">
					<input class="login-btn" name="submit" type="submit" value=" LOGIN ">
				
				</form>
				<br />
				<br />
				
			<strong><p class="treb">Don't have an account yet? Register <a href="register.php">here</a></p></strong>
			</div>
	 </body>

</html>

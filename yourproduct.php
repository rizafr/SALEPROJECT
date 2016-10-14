<?php
	include('yourproducthandler.php');
?>

<html>
	<head>
	  <title>PHP Test</title>	  
	  <link rel="stylesheet" type="text/css" href="style.css">
	 </head>
	 <body>
			 <div class="top-box">				 
			 <h1><span class="red">Sale</span><span class="blue">Project</span></h1>
			</div>

			<div class="catalog-box">
					<label for="hi">Hi, <?php echo $username; ?>!</label>
					<a href="logout.php"><label for="logout"><span class="red">logout</label></a><br>
			 	<div class="navbar">
					<ul class= nav>
			 			<li><a href=<?php echo "catalog.php?"."user=$username" ?>>Catalog</a></li>
			  			<li><a class="active">Your Products</a></li>
			  			<li><a href=<?php echo "addproduct.php?"."user=$username" ?>>Add Product</a></li>
			  			<li><a href=<?php echo "sales.php?"."user=$username" ?>>Sales</a></li>
			  			<li><a href=<?php echo "purchases.php?"."user=$username" ?>>Purchase</a></li>
					</ul>
				</div>

				<h2>What are you going to sell today?</h2>
				<hr>

				<?php 
					$username=$_GET['user'];

					if (count($name)==0) {
						?>
						<p>No Item</p>
						<?php
					} else {
					$i = -1;

					foreach($name as $namevalue)
					{
						$i++;
				?>
				<div class="item">
					<strong><p><?php $date = new Datetime($datetime[$i]); echo date_format($date, 'l\, d F Y\ ') ?><br></strong>
					at <?php $date = new Datetime($datetime[$i]); echo date_format($date, 'H:i') ?> </p>
					<hr style="width: 100%; float: right;"/>
					<br />
					<table>
						<tr class="Row">
							<td class="item-img">
								<img src=<?php echo $photo[$i]	?> class = "img-catalog">
							</td>
							<td class="item-desc">
								<strong><p class="item-name"><?php echo $namevalue?></p></strong>
								<p class="item-price"><?php echo $price[$i] ?></p>
								<p class="item-description"><?php echo $desc[$i]?></p>
								<?php
								$connection = mysqli_connect("localhost", "root", "", "saleproject");
								$sql = "SELECT COUNT(*) FROM purchase WHERE productid=$productid[$i]";
								$result = $connection->query($sql);
								if ($result->num_rows > 0) {
							     // output data of each row
							    	while($row = $result->fetch_assoc()) {
							        	$count = $row["COUNT(*)"];
							     	}
								}

								?>
							</td>
							<td class="item-like">
								<div style="margin:0 0 0 25px">
								<p><?php echo $like[$i]?> likes<br>
								<?php echo $count; ?> purchases</p>
								</div>
								<div class="edit">
								<a style="color:#f99d25" href = <?php echo "'editproduct.php?pid=$productid[$i]&user=$username'"; ?> >EDIT</a>
								</div>
								<div class="delete">
								<a style="color:#f43730" onclick="return confirm('Are you sure want to delete it?')"; 
								href =<?php echo "'deleteproduct.php?pid=$productid[$i]&user=$username'"; ?> >DELETE</a>
								</div>

							</td>
						</tr>
					</table>
					<br />
					<hr style="width: 100%; float: right;"/>
				</div>
				<?php } }?>
			</div>
			



	 </body>

</html>
<?<?php  
	include('purchaseshandler.php');
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
				<label for="hi">Hi, <?php echo $username ?>!</label>
				<a href="logout.php"><label for="logout"><span class="red">logout</label></a><br>

			 	<div class="navbar">
					<ul class= nav>
			 			<li><a href=<?php echo "catalog.php?"."user=$username" ?>>Catalog</a></li>
			  			<li><a href=<?php echo "yourproduct.php?"."user=$username" ?>>Your Products</a></li>
			  			<li><a href=<?php echo "addproduct.php?"."user=$username" ?>>Add Product</a></li>
			  			<li><a href=<?php echo "sales.php?"."user=$username" ?>>Sales</a></li>
			  			<li><a class="active" >Purchase</a></li>
					</ul>
				</div>

				<h2>Here are your purchases</h2>
				<hr>

				<?php 
						$i = -1;  
						foreach($photo as $photovalue)
						{
							$i++;
				?>
					
					<div class="item">
						<br>
						<strong><p><?php $date = new Datetime($datetime[$i]); echo date_format($date, 'l\, d F Y\ ') ?><br></strong>
						at <?php $date = new Datetime($datetime[$i]); echo date_format($date, 'H:i')?></p>
						<hr style="width: 100%; float: right;"/>
						<br />
						<table>
							<tr class ="Row">
								<td class="item-img">
									<img src=<?php echo $photo[$i]	?> class = "img-catalog">
								</td>
								<td class="item-desc">
											<strong><p class="item-name"><span style="font-size: 22px" ><?php echo $productname[$i] ?></span><br></strong>
									IDR <?php echo number_format($price[$i] * $qty[$i],0,".",".")?><br>
									
									<?php echo $qty[$i] ?> pcs<br>
									@IDR <?php echo number_format($price[$i],0,".",".")?></p> 
									<br/>
									<p>bought from <strong><?php echo $seller[$i]?></strong></p>

										</div>
								<td class="item-like">
									<p>Delivery to <strong><?php echo $consignee[$i]?></strong><br>
									<?php echo $address[$i] ?><br>
									<?php echo $postalcode[$i] ?><br>
									<?php echo $phone[$i] ?></p>
								</td>
								<tr>
						</table>
						
						<br />

					</div>
					<br />
					<?php } ?>

			</div>

	 </body>

</html>
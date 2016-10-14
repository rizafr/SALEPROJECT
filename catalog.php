<?php
	include ('showcatalog.php');
?>

<html>
	<head>
	  <title>PHP Test</title>	  
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <script>
												function likeProduct(int,id,prod,like,purchase,iter){
													  if (window.XMLHttpRequest) {
													    // code for IE7+, Firefox, Chrome, Opera, Safari
													    xmlhttp=new XMLHttpRequest();
													  } else {  // code for IE6, IE5
													    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
													  }
													  xmlhttp.onreadystatechange=function() {
													    if (this.readyState==4 && this.status==200) {
													      document.getElementById("poll"+iter).innerHTML=this.responseText;
													    }
													  }
													  xmlhttp.open("GET","like.php?value="+int+"&id="+id+"&produk="+prod+"&like="+like+"&purchase="+purchase+"&iter="+iter,true);
													  xmlhttp.send();
												}
		</script>
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
				 			<li><a class="active">Catalog</a></li>
				  			<li><a href=<?php echo "yourproduct.php?"."user=$username" ?>>Your Products</a></li>
				  			<li><a href=<?php echo "addproduct.php?"."user=$username" ?>>Add Product</a></li>
				  			<li><a href=<?php echo "sales.php?"."user=$username" ?>>Sales</a></li>
				  			<li><a href=<?php echo "purchases.php?"."user=$username" ?>>Purchase</a></li>
						</ul>
					</div>

					<h2>What are you going to buy today?</h2>
					<hr>

				
					<form action= <?php echo "catalog.php"."?user=$username" ?> method="post">
						<input id="searchbox" type="text" name="namesearch" placeholder="Search Catalog ...">
						<input name="user" type="hidden" value="$username">
						<input id = "searchbutton" type="submit" value="GO">
						<br><br><br>
						<table>
						<tr>
							<td style="padding: 0 0 24.5px 0"><p>by</p></td>
							<td>
							<input type="radio" name="searchby"
							<?php if (isset($searchby) && $searchby=="Store") echo "checked";?>
							value="Store">Store<br>
							<input type="radio" name="searchby"
							<?php if (isset($searchby) && $searchby=="Product") echo "checked";?>
							value="Product">Product
							</td>
						</tr>
						</table>
					</form>
					<?php 
						$i = -1;  
						foreach($user as $uservalue)
						{
							$i++;
							$count = 0;
							$sql = "SELECT COUNT(*) FROM purchase WHERE productid=$productid[$i]";
							$result = $connection->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								    $count = $row["COUNT(*)"];
								}
							}
					?>
					
					<div class="item">
						<p><strong><?php echo "$uservalue"?></strong><br />
						added this on <?php $date = new Datetime($datetime[$i]); echo date_format($date, 'l\, d F Y\, \a\t H:i') ?></p> 
						<hr style="width: 100%; float: right;"/>
						<br />
						<table>
							<tr class ="Row">
								<td class="item-img">
									<img src=<?php echo $photo[$i]	?> class = "img-catalog">
								</td>
								<td class="item-desc">
											<p class="item-name"><strong><span><?php echo $name[$i] ?><span>	</strong><br>
											<span class="item-price">IDR <?php echo number_format($price[$i],0,".",".")?></span><br>
											<span class="item-description"><?php echo $desc[$i]?><span></p>

										</div>
								<td class="item-like">
									<div id=<?php echo "poll".$i ; ?> >
										<table>
											<p><?php echo $like[$i]?> likes</p>
													<p><?php echo $count; ?> purchases</p>
											<tr>
												<td>
														<input id="<?php echo $username; ?>" type="button" name="vote" value="LIKE" class="blue" onclick="likeProduct(this.value,this.id,<?php echo $productid[$i]; ?>,<?php echo $like[$i]; ?>,<?php echo $count; ?>,<?php echo $i; ?>)">
		
												
												</td>
												<td>
													<a href= <?php echo "confirmation-purchase.php?user=".$username."&produk=".$productid[$i] ?>><input type="button" value="BUY" class="blue"></a>
												
												</td>
											</tr>
										</table>
									</div>											
								</td>
								<tr>
						</table>
						<br />

						<hr style="width: 100%; float: right;"/>
					</div>
					<?php } ?>
					<!-- ITEM PRODUK -->
			</div>

	 </body>

</html>



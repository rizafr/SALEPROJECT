<?php 
	
	$connection = mysqli_connect("localhost","root","","saleproject");
	$value = $_REQUEST['value'];
	$user = $_REQUEST['id'];
	$produk = $_REQUEST['produk'];
	$like = $_REQUEST['like'];
	$count = $_REQUEST['purchase'];
	$i = $_REQUEST['iter'];
	if ( $value == "LIKE"){
		$value = "UNLIKE";
		$class = "red";
		$query1 = "INSERT INTO likebyuser (username, productid) VALUES ('$user',$produk )";
		$query2 = "UPDATE product SET likeamount=likeamount+1 WHERE productid=$produk";
		$like += 1;
	}
	else
	{
		$value = "LIKE";
		$class = "blue";
		$query1 = "DELETE FROM likebyuser where (username ='$user' AND productid=$produk )";
		$query2 = "UPDATE product SET likeamount=likeamount-1 WHERE productid=$produk";
		$like -= 1;
	}
	
	mysqli_query($connection, $query1);
	mysqli_query($connection, $query2);
	$connection->close();
?>
<table>
	<p><?php echo $like?> likes</p>
	<p><?php echo $count; ?> purchases</p>
	<tr>
		<td>
			<input id=<?php echo $user; ?> type="button" name="vote" value=<?php echo $value; ?> class=<?php echo $class; ?> onclick="likeProduct(this.value,this.id,<?php echo $produk; ?>,<?php echo $like; ?>,<?php echo $count; ?>, <?php echo $i; ?>)">
		</td>
		<td>
			<a href= <?php echo "confirmation-purchase.php?user=".$user."&produk=".$produk ?>><input type="button" value="BUY" class="blue"></a>
		</td>
	</tr>
</table>
		
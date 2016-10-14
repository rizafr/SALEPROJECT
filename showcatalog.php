<?php
    $username = $_GET["user"];
	$connection = mysqli_connect("localhost", "root", "", "saleproject");

    if (!isset($_POST["searchby"]) || !isset($_POST['namesearch'])) {
    	$sql = "select * from product natural join user ORDER BY add_date";
    } else {
        $name = $_POST['namesearch'];
        if ($_POST["searchby"]=="Store") {
            $sql = "SELECT * FROM product NATURAL JOIN user WHERE username LIKE '%$name%' ORDER BY add_date";
        } elseif ($_POST["searchby"]=="Product") {
            $sql = "select * from product natural join user where productname like '%$name%' order by add_date";
        }
    } 
    $result = $connection->query($sql);
    $i = 0;
    $name = NULL;
    $user = NULL;
    $productid = NULL;
    $desc = NULL;
    $price = NULL;
    $photo = NULL;
    $datetime = NULL;
    $like = NULL;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                $user[$i] = $row["username"];
                $name[$i] = $row["productname"];
                $productid[$i] = $row["productid"];
                $desc[$i] = $row["description"];
                $price[$i] = $row["price"];
                $photo[$i] = $row["photo"];
                $datetime[$i] = $row["add_date"];
                $like[$i] = $row["likeamount"];
                $i++;
            }
        }

?>
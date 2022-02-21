<?php

	require('connection.php');

	$sqlCat = "SELECT * FROM product";

	$queryCat = $conn->query($sqlCat);

	$data_list = array();

	while($dataCat = mysqli_fetch_assoc($queryCat)) {
		$pdId = $dataCat['product_id'];
		$pdName = $dataCat['product_name'];

		$data_list[$pdId] = $pdName;
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Store Product List</title>
</head>
<body>

	<?php 
		
		$sql = "SELECT * FROM store_product";

		$query = $conn->query($sql);

		// $data = mysqli_fetch_assoc($query);
		echo "<table border='1'><tr><th>Store Product ID</th><th>Store Product Name</th><th>Store Product Quantity</th><th>Store Product Entry Date</th><th>Action</th></tr>";

		while($data = mysqli_fetch_assoc($query)) {
			$stPdID = $data['store_product_id'];
			$stPdQuantity = $data['store_product_quantity'];
			$stPdName = $data['store_product_name'];
			$pdEnDate = $data['store_product_entrydate'];

			echo "<tr>
					<td>$stPdID</td>
					<td>$data_list[$stPdName]</td>
					<td>$stPdQuantity</td>
					<td>$pdEnDate</td>
					<td><a href='edit_store_product.php?id=$stPdID'>Edit</a></td>
				</tr>";
		}

		echo "</table>";
	 ?>

	
</body>
</html>
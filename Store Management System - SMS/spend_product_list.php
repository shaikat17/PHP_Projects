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

	session_start();

	$userEmail = $_SESSION['userEmail'];

	if(!empty($userEmail)) {

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
		
		$sql = "SELECT * FROM spend_product";

		$query = $conn->query($sql);

		// $data = mysqli_fetch_assoc($query);
		echo "<table border='1'><tr><th>Spend Product ID</th><th>Spend Product Name</th><th>Spend Product Quantity</th><th>Spend Product Entry Date</th><th>Action</th></tr>";

		while($data = mysqli_fetch_assoc($query)) {
			$spendPdID = $data['spend_product_id'];
			$spendPdQuantity = $data['spend_product_quantity'];
			$spendPdName = $data['spend_product_name'];
			$spendEnDate = $data['spend_product_entrydate'];

			echo "<tr>
					<td>$spendPdID</td>
					<td>$data_list[$spendPdName]</td>
					<td>$spendPdQuantity</td>
					<td>$spendEnDate</td>
					<td><a href='edit_spend_product.php?id=$spendPdID'>Edit</a></td>
				</tr>";
		}

		echo "</table>";
	 ?>

	
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
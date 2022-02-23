<?php
	require('connection.php');

	$sqlCat = "SELECT * FROM category";

	$queryCat = $conn->query($sqlCat);

	$data_list = array();

	while($data1 = mysqli_fetch_assoc($queryCat)){
		$catID = $data1['category_id'];
		$catName = $data1['category_name'];

		$data_list[$catID] = $catName;
	}

	// print_r($data_list);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Category List</title>
</head>
<body>

	<?php 
		
		$sql = "SELECT * FROM product";

		$query = $conn->query($sql);

		// $data = mysqli_fetch_assoc($query);
		echo "<table border='1'><tr><th>Product ID</th><th>Product Name</th><th>Product Category</th><th>Product Code</th><th>Product Entry Date</th><th>Action</th></tr>";

		while($data = mysqli_fetch_assoc($query)) {
			$pdID = $data['product_id'];
			$pdName = $data['product_name'];
			$pdCat = $data['product_category'];
			$pdCode = $data['product_code'];
			$pdEnDate = $data['product_entrydate'];

			echo "<tr>
					<td>$pdID</td>
					<td>$pdName</td>
					<td>$data_list[$pdCat]</td>
					<td>$pdCode</td>
					<td>$pdEnDate</td>
					<td><a href='edit_product.php?id=$pdID'>Edit</a></td>
				</tr>";
		}

		echo "</table>";
	 ?>

	
</body>
</html>
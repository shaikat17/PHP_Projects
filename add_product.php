<?php
	require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Product</title>
</head>
<body>

	<?php 
		if(isset($_POST['product_name'])) {
			$product_name = $_POST['product_name'];
			$product_code = $_POST['product_code'];
			$product_category = $_POST['product_category'];
			$product_entrydate = $_POST['product_entrydate'];

			$sql = "INSERT INTO product (product_name, product_category, product_code, product_entrydate) VALUES ('$product_name', '$product_category', '$product_code', '$product_entrydate')";

			if ($conn->query($sql) === TRUE) {
			  echo "New product recoded successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	 ?>

	 <?php 
	 	$sql_ca = "SELECT * FROM category";

		$query = $conn->query($sql_ca);

		// <? php echo $_SERVER['PHP_SELP'] 

	 ?>

	<form action="add_product.php" method="POST">
		Product Name: <br>
		<input type="text" name="product_name"><br><br>
		Product Category: <br>
		<select name="product_category">
			<?php
			while($data = mysqli_fetch_assoc($query)) {
				$category_name = $data['category_name'];
				$category_id = $data['category_id'];

					echo "<option value='$category_id'>$category_name</option>";
			}
			?>
		</select><br><br>
		Product Code: <br>
		<input type="text" name="product_code"><br><br>
		Product Entry Date: <br>
		<input type="date" name="product_entrydate"> <br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
<?php
	require('connection.php');
	require('queryFunction.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Store Product</title>
</head>
<body>

	<?php 
		if(isset($_GET['id'])) {
			$getID = $_GET['id'];

			$sql = "SELECT * FROM store_product WHERE store_product_id = $getID";

			$query = $conn->query($sql);
			$data = mysqli_fetch_assoc($query);

			$store_product_id = $data['store_product_id'];
			$store_product_name = $data['store_product_name'];
			$store_product_quantity = $data['store_product_quantity'];
			$store_product_entrydate = $data['store_product_entrydate'];
		}

		if(isset($_POST['store_product_name'])) {
			$store_product_id = $_POST['store_product_id'];
			$store_product_name = $_POST['store_product_name'];
			$store_product_quantity = $_POST['store_product_quantity'];
			$store_product_entrydate = $_POST['store_product_entrydate'];

			$up_sql = "UPDATE store_product SET 
			store_product_name='$store_product_name', 
			store_product_quantity='$store_product_quantity',
			store_product_entrydate='$store_product_entrydate' WHERE store_product_id='$store_product_id'";

			if ($conn->query($up_sql) === TRUE) {
			  echo "Record updated successfully";
			} else {
			  echo "Not Updated";
			}
		}
		
	 ?>


	<form action="edit_store_product.php" method="POST">
		Product :<br>
		<select name="store_product_name">
			<?php
				$sql_ca = "SELECT * FROM product";

				$query = $conn->query($sql_ca);

				while($data = mysqli_fetch_assoc($query)) {
							$data_name = $data['product_name'];
							$data_id = $data['product_id'];

			?>
				<option value='<?php echo $data_id ?>' <?php if($data_id == $store_product_name) {echo 'selected';} ?> ><?php echo $data_name ?></option>";
				<?php
						}
			?>
		</select><br><br>
		Product Quantity: <br>
		<input type="text" value="<?php echo $store_product_quantity ?>" name="store_product_quantity"><br><br>
		Store Entry Date: <br>
		<input type="date" value="<?php echo $store_product_entrydate ?>" name="store_product_entrydate"> <br><br>
		<input type="hidden" value="<?php echo $store_product_id ?>" name="store_product_id">
		<input type="submit" value="Update">
	</form>
</body>
</html>
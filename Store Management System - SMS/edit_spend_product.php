<?php
	require('connection.php');
	require('queryFunction.php');

	session_start();

	$userEmail = $_SESSION['userEmail'];

	if(!empty($userEmail)) {

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

			$sql = "SELECT * FROM spend_product WHERE spend_product_id = $getID";

			$query = $conn->query($sql);
			$data = mysqli_fetch_assoc($query);

			$spend_product_id = $data['spend_product_id'];
			$spend_product_name = $data['spend_product_name'];
			$spend_product_quantity = $data['spend_product_quantity'];
			$spend_product_entrydate = $data['spend_product_entrydate'];
		}

		if(isset($_POST['spend_product_name'])) {
			$spend_product_id = $_POST['spend_product_id'];
			$spend_product_name = $_POST['spend_product_name'];
			$spend_product_quantity = $_POST['spend_product_quantity'];
			$spend_product_entrydate = $_POST['spend_product_entrydate'];

			$up_sql = "UPDATE spend_product SET 
			spend_product_name='$spend_product_name', 
			spend_product_quantity='$spend_product_quantity',
			spend_product_entrydate='$spend_product_entrydate' WHERE spend_product_id='$spend_product_id'";

			if ($conn->query($up_sql) === TRUE) {
			  echo "Record updated successfully";
			} else {
			  echo "Not Updated";
			}
		}
		
	 ?>


	<form action="edit_spend_product.php" method="POST">
		Product :<br>
		<select name="spend_product_name">
			<?php
				$sql_ca = "SELECT * FROM product";

				$query = $conn->query($sql_ca);

				while($data = mysqli_fetch_assoc($query)) {
							$data_name = $data['product_name'];
							$data_id = $data['product_id'];

			?>
				<option value='<?php echo $data_id ?>' <?php if($data_id == $spend_product_name) {echo 'selected';} ?> ><?php echo $data_name ?></option>";
				<?php
						}
			?>
		</select><br><br>
		Product Quantity: <br>
		<input type="text" value="<?php echo $spend_product_quantity ?>" name="spend_product_quantity"><br><br>
		Store Entry Date: <br>
		<input type="date" value="<?php echo $spend_product_entrydate ?>" name="spend_product_entrydate"> <br><br>
		<input type="hidden" value="<?php echo $spend_product_id ?>" name="spend_product_id">
		<input type="submit" value="Update">
	</form>
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
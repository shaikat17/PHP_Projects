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
	<title>Spend Store</title>
</head>
<body>

	<?php 
		if(isset($_POST['spend_product_name'])) {

			// echo $_POST['spend_product_name'];

			$spend_product_name = $_POST['spend_product_name'];
			$spend_product_quantity = $_POST['spend_product_quantity'];
			$spend_product_entrydate = $_POST['spend_product_entrydate'];

			$sql = "INSERT INTO spend_product (spend_product_name, spend_product_quantity, spend_product_entrydate) VALUES ('$spend_product_name', '$spend_product_quantity', '$spend_product_entrydate')";

			if ($conn->query($sql) === TRUE) {
			  echo "New Spend recoded successfully";
			} else {
			  echo "Not Added";
			}
		}
	 ?>


	<form action="add_spend_product.php" method="POST">
		Product :<br>
		<select name="spend_product_name">
			<?php
				data_list('product','product_name','product_id');
			?>
		</select><br><br>
		Product Quantity: <br>
		<input type="text" name="spend_product_quantity"><br><br>
		Spend Entry Date: <br>
		<input type="date" name="spend_product_entrydate"> <br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
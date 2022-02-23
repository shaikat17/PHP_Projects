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
		if(isset($_POST['store_product_name'])) {
			$store_product_name = $_POST['store_product_name'];
			$store_product_quantity = $_POST['store_product_quantity'];
			$store_product_entrydate = $_POST['store_product_entrydate'];

			$sql = "INSERT INTO store_product (store_product_name, store_product_quantity, store_product_entrydate) VALUES ('$store_product_name', '$store_product_quantity', '$store_product_entrydate')";

			if ($conn->query($sql) === TRUE) {
			  echo "New product recoded successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	 ?>


	<form action="add_store_product.php" method="POST">
		Product :<br>
		<select name="store_product_name">
			<?php
				data_list('product','product_name','product_id');
			?>
		</select><br><br>
		Product Quantity: <br>
		<input type="text" name="store_product_quantity"><br><br>
		Store Entry Date: <br>
		<input type="date" name="store_product_entrydate"> <br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
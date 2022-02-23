<?php
	require('connection.php');

	session_start();

	$userEmail = $_SESSION['userEmail'];

	if(!empty($userEmail)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Product</title>
</head>
<body>

	<?php 

	$product_id = '';
	$product_name = '';
	$product_code = '';
	$product_category = '';
	$product_entrydate = '';


		if(isset($_GET['id'])) {
			$getID = $_GET['id'];

			// echo $getID;

			$sql = "SELECT * FROM product WHERE product_id = $getID";

			$query = $conn->query($sql);
			$data = mysqli_fetch_assoc($query);

			$product_id = $data['product_id'];
			$product_name = $data['product_name'];
			$product_code = $data['product_code'];
			$product_category = $data['product_category'];
			$product_entrydate = $data['product_entrydate'];
		}

		if(isset($_POST['product_name'])) {
			$pd_id = $_POST['product_id'];
			$pd_name = $_POST['product_name'];
			$pd_code = $_POST['product_code'];
			$pd_category = $_POST['product_category'];
			$pd_entrydate = $_POST['product_entrydate'];

			$up_sql = "UPDATE product SET 
			product_name='$pd_name', 
			product_entrydate='$pd_entrydate', product_code='$pd_code', product_category='$pd_category' WHERE product_id='$pd_id'";

			if ($conn->query($up_sql) === TRUE) {
			  echo "Record updated successfully";
			} else {
			  echo "Not Updated";
			}
		}
	 ?>

	 <?php 
	 	$sql_ca = "SELECT * FROM category";

		$query = $conn->query($sql_ca);

		// <? php echo $_SERVER['PHP_SELP'] 

	 ?>

	<form action="edit_product.php" method="POST">
		Product Name: <br>
		<input type="text" value="<?php echo $product_name ?>" name="product_name"><br><br>
		Product Category: <br>
		<select name="product_category">
			<?php
			while($data = mysqli_fetch_assoc($query)) {
				$category_name = $data['category_name'];
				$category_id = $data['category_id'];

				?>
					<option value='<?php echo $category_id ?>' <?php if($category_id == $product_category) {echo "selected";} ?> ><?php echo $category_name ?></option>;
			<?php
			}
			?>
		</select><br><br>
		Product Code: <br>
		<input type="text" value="<?php echo $product_code ?>" name="product_code"><br><br>
		<input type="hidden" value="<?php echo $product_id ?>" name="product_id">
		Product Entry Date: <br>
		<input type="date" value="<?php echo $product_entrydate ?>" name="product_entrydate"> <br><br>
		<input type="submit" value="Update">
	</form>
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
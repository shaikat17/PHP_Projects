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
	<title>Add Product</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

	 <div class="container bg-light">
		<div class="container-fluid border-bottom border-success">
			<?php include('topbar.php'); ?>
			
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 bg-light p-0 m-0">

					<?php include('leftbar.php'); ?>

				</div>
				<div class="col-md-8 p-3 border-start border-success">
					<form action="add_product.php" method="POST">
						<label class="form-label" for="pName">Product Name:</label>
						<input class="form-control" id="pName" type="text" name="product_name">
						<label for="slt">Product Category:</label>
						<select id="slt" class="form-select" name="product_category">
							<?php
							while($data = mysqli_fetch_assoc($query)) {
								$category_name = $data['category_name'];
								$category_id = $data['category_id'];

									echo "<option value='$category_id'>$category_name</option>";
							}
							?>
						</select>
						<label class="form-label" for="pCd">Product Code:</label>
						<input class="form-control" id="pCd" type="text" name="product_code">
						<label for="pDt" class="form-label">Product Entry Date:</label>
						<input type="date" id="pDt" class="form-control" name="product_entrydate">
						<input class="btn btn-success mt-2" type="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>
		<div class="container-fluid border-top border-success">
			<?php include('botombar.php'); ?>
		</div>
	</div>

	
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
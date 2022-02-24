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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
					<form action="add_store_product.php" method="POST">
						<label class="form-lebel" for="pn">Product:</label>
						<select id="pn" class="form-select" name="store_product_name">
							<?php
								data_list('product','product_name','product_id');
							?>
						</select>
						<label for="stq" class="form-label">Product Quantity:</label>
						<input id="stq" class="form-control" type="text" name="store_product_quantity">
						<label for="sdt" class="form-label">Store Entry Date:</label> 
						<input id="sdt" class="form-control" type="date" name="store_product_entrydate">
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
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
					<form action="edit_store_product.php" method="POST">
						<label for="spn" class="form-label"></label>
						<select id="spn" class="form-select" name="store_product_name">
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
						</select>
						<label for="spq" class="form-label"></label>
						<input id="spq" class="form-control" type="text" value="<?php echo $store_product_quantity ?>" name="store_product_quantity">
						<label for="spdt" class="form-label"></label>
						<input id="spdt" class="form-control" type="date" value="<?php echo $store_product_entrydate ?>" name="store_product_entrydate"> <br><br>
						<input type="hidden" value="<?php echo $store_product_id ?>" name="store_product_id">
						<input class="btn btn-success" type="submit" value="Update">
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
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
					<form action="edit_spend_product.php" method="POST">
						<label for="spn" class="form-label"></label>
						<select id="spn" class="form-select" name="spend_product_name">
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
						</select>
						<label for="spq" class="form-label"></label>
						<input id="spq" class="form-control" type="text" value="<?php echo $spend_product_quantity ?>" name="spend_product_quantity">
						<label for="spdt" class="form-label"></label>
						<input id="spdt" class="form-control" type="date" value="<?php echo $spend_product_entrydate ?>" name="spend_product_entrydate"> <br><br>
						<input type="hidden" value="<?php echo $spend_product_id ?>" name="spend_product_id">
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
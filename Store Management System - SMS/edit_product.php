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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
					<form action="edit_product.php" method="POST">
						<label for="pn" class="form-label"></label>
						<input id="pn" class="form-control" type="text" value="<?php echo $product_name ?>" name="product_name">
						<label for="pc" class="form-label"></label>
						<select id="pc" class="form-select" name="product_category">
							<?php
							while($data = mysqli_fetch_assoc($query)) {
								$category_name = $data['category_name'];
								$category_id = $data['category_id'];

								?>
									<option value='<?php echo $category_id ?>' <?php if($category_id == $product_category) {echo "selected";} ?> ><?php echo $category_name ?></option>;
							<?php
							}
							?>
						</select>
						<label for="pcd" class="form-label"></label>
						<input id="pcd" class="form-control" type="text" value="<?php echo $product_code ?>" name="product_code">
						<input type="hidden" value="<?php echo $product_id ?>" name="product_id">
						<label for="pdt" class="form-label"></label>
						<input id="pdt" class="form-control" type="date" value="<?php echo $product_entrydate ?>" name="product_entrydate"> <br><br>
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
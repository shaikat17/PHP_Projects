<?php
	require('connection.php');

	$sqlCat = "SELECT * FROM category";

	$queryCat = $conn->query($sqlCat);

	$data_list = array();

	while($data1 = mysqli_fetch_assoc($queryCat)){
		$catID = $data1['category_id'];
		$catName = $data1['category_name'];

		$data_list[$catID] = $catName;
	}

	// print_r($data_list);

	session_start();

	$userEmail = $_SESSION['userEmail'];

	if(!empty($userEmail)) {
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Category List</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

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
					<?php 
		
						$sql = "SELECT * FROM product";

						$query = $conn->query($sql);

						// $data = mysqli_fetch_assoc($query);
						echo "<table class='table table-striped table-hover'><tr><th>Product ID</th><th>Product Name</th><th>Product Category</th><th>Product Code</th><th>Product Entry Date</th><th>Action</th></tr>";

						while($data = mysqli_fetch_assoc($query)) {
							$pdID = $data['product_id'];
							$pdName = $data['product_name'];
							$pdCat = $data['product_category'];
							$pdCode = $data['product_code'];
							$pdEnDate = $data['product_entrydate'];

							echo "<tr class='align-middle'>
									<td>$pdID</td>
									<td>$pdName</td>
									<td>$data_list[$pdCat]</td>
									<td>$pdCode</td>
									<td>$pdEnDate</td>
									<td><a class='btn btn-success' href='edit_product.php?id=$pdID'>Edit</a></td>
								</tr>";
						}

						echo "</table>";
					 ?>
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
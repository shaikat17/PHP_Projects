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
		
		$sql = "SELECT * FROM category";

		$query = $conn->query($sql);

		// $data = mysqli_fetch_assoc($query);
		echo "<table class='table table-striped table-hover'><tr><th>Category ID</th><th>Category Name</th><th>Entry Date</th><th>Action</th></tr>";

		while($data = mysqli_fetch_assoc($query)) {
			$ctID = $data['category_id'];
			$ctName = $data['category_name'];
			$ctEnDate = $data['category_entrydate'];

			echo "<tr class='align-middle'>
					<td>$ctID</td>
					<td>$ctName</td>
					<td>$ctEnDate</td>
					<td><a class='btn btn-success' href='edit_category.php?id=$ctID'>Edit</a></td>
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
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
	<title>Edit Category</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

	<?php 

	$ctID = '';
	$ctName = '';
	$ctEnDate = '';


		if(isset($_GET['id'])) {
			$id = $_GET['id'];

			$sql = "SELECT * FROM category WHERE category_id = $id";

			$query = $conn->query($sql);

			$data = mysqli_fetch_assoc($query);

			$ctID = $data['category_id'];
			$ctName = $data['category_name'];
			$ctEnDate = $data['category_entrydate'];
		} 

		if(isset($_GET['category_name'])) {
			$category_name = $_GET['category_name'];
			$category_entrydate = $_GET['category_entrydate'];
			$category_id = $_GET['category_id'];

			$up_sql = "UPDATE category SET 
			category_name='$category_name', 
			category_entrydate='$category_entrydate' WHERE category_id='$category_id'";

			if ($conn->query($up_sql) === TRUE) {
			  echo "Record updated successfully";
			} else {
			  echo "Error: " . $up_sql . "<br>" . $conn->error;
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
					<form action="edit_category.php" method="GET">
						<input type="hidden" name="category_id" value="<?php echo $ctID ?>">
						<label class="form-label" for="ctn">Category:</label>
						<input id="ctn" class="form-control" type="text" name="category_name" value="<?php echo $ctName ?>">
						<label for="ctdt" class="form-label"></label>
						<input id="cndt" class="form-control" type="date" name="category_entrydate" value="<?php echo $ctEnDate ?>"> <br><br>
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
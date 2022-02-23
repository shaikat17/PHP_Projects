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

	<form action="edit_category.php" method="GET">
		<input type="hidden" name="category_id" value="<?php echo $ctID ?>">
		Category: <br>
		<input type="text" name="category_name" value="<?php echo $ctName ?>"><br><br>
		Category Entry Date: <br>
		<input type="date" name="category_entrydate" value="<?php echo $ctEnDate ?>"> <br><br>
		<input type="submit" value="Update">
	</form>
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
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
	<title>Add Category</title>
</head>
<body>

	<?php 
		if(isset($_POST['category_name'])) {
			// echo $_POST['category_name'];
			$category_name = $_POST['category_name'];
			$category_entrydate = $_POST['category_entrydate'];

			$sql = "INSERT INTO category (category_name, category_entrydate) VALUES ('$category_name', '$category_entrydate')";

			if ($conn->query($sql) === TRUE) {
			  echo "New record created successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	 ?>

	<form action="add_category.php" method="POST">
		Category: <br>
		<input type="text" name="category_name"><br><br>
		Category Entry Date: <br>
		<input type="date" name="category_entrydate"> <br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
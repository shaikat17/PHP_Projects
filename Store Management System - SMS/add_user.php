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
	<title>Add User</title>
</head>
<body>

	<?php 
		if(isset($_POST['user_first_name'])) {

			// echo $_POST['spend_product_name'];

			$user_first_name = $_POST['user_first_name'];
			$user_last_name = $_POST['user_last_name'];
			$user_email = $_POST['user_email'];
			$user_pass = $_POST['user_pass'];

			$sql = "INSERT INTO users (user_first_name, user_last_name, user_email, user_pass) VALUES ('$user_first_name', '$user_last_name', '$user_email', '$user_pass')";

			if ($conn->query($sql) === TRUE) {
			  echo "New User Added successfully";
			} else {
			  echo "Not Added";
			}
		}
	 ?>


	<form action="add_user.php" method="POST" autocomplete="off">
		User First Name: <br>
		<input type="text" name="user_first_name"><br><br>
		User Last Name: <br>
		<input type="text" name="user_last_name"> <br><br>
		User Email: <br>
		<input type="email" name="user_email"><br><br>
		User Password: <br>
		<input type="password" name="user_pass"><br><br>
		<input type="submit" value="Add User">
	</form>
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
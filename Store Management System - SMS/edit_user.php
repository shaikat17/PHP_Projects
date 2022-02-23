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
	<title>Edit User</title>
</head>
<body>

	<?php 

	$userID = '';
	$userFirstName = '';
	$userLastName = '';
	$userEmail = '';
	$userPass = '';


		if(isset($_GET['id'])) {
			$id = $_GET['id'];

			$sql = "SELECT * FROM users WHERE user_id = $id";

			$query = $conn->query($sql);

			$data = mysqli_fetch_assoc($query);

			$userID = $data['user_id'];
			$userFirstName = $data['user_first_name'];
			$userLastName = $data['user_last_name'];
			$userEmail = $data['user_email'];
			$userPass = $data['user_pass'];
		} 

		if(isset($_POST['user_first_name'])) {

			$userID = $_POST['user_id'];
			$userFirstName = $_POST['user_first_name'];
			$userLastName = $_POST['user_last_name'];
			$userEmail = $_POST['user_email'];
			$userPass = $_POST['user_pass'];

			$up_sql = "UPDATE users SET 
			user_first_name='$userFirstName', 
			user_last_name='$userLastName',
			user_email= '$userEmail',
			user_pass = '$userPass' WHERE user_id='$userID'";

			if ($conn->query($up_sql) === TRUE) {
			  echo "User Information updated successfully";
			} else {
			  echo "Error: " . $up_sql . "<br>" . $conn->error;
			}
		}

	 ?>

	<form action="edit_user.php" method="POST" autocomplete="off">
		User First Name: <br>
		<input type="text" value="<?php echo $userFirstName ?>" name="user_first_name"><br><br>
		User Last Name: <br>
		<input type="text" value="<?php echo $userLastName ?>" name="user_last_name"> <br><br>
		<input type="hidden" value="<?php echo $userID ?>" name="user_id">
		User Email: <br>
		<input type="email" value="<?php echo $userEmail ?>" name="user_email"><br><br>
		User Password: <br>
		<input type="password" value="<?php echo $userPass ?>" name="user_pass"><br><br>
		<input type="submit" value="Update User">
	</form>
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
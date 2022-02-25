<?php
	require('connection.php');
	session_start();

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
		if(isset($_POST['user_email'])) {
			$user_email = $_POST['user_email'];
			$user_pass = $_POST['user_pass'];

			$sql = "SELECT * FROM users WHERE user_email='$user_email' AND user_pass='$user_pass' ";

			$query = $conn->query($sql);

			if(mysqli_num_rows($query) > 0) {

				$data = mysqli_fetch_array($query);

				$userEmail = $data['user_email'];
				$username = $data['user_first_name'];

				$_SESSION['userEmail'] = $userEmail;
				$_SESSION['username'] = $username;

				header('location:index.php');
			} else {
				echo 'User Not Found';
			}

		}
	 ?>


	<form action="login.php" method="POST" autocomplete="off">
		User Email: <br>
		<input type="email" name="user_email"><br><br>
		User Password: <br>
		<input type="password" name="user_pass"><br><br>
		<input type="submit" value="Login">
	</form>
</body>
</html>
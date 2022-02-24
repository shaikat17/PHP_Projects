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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
					<form action="add_user.php" method="POST" autocomplete="off">
						<label for="fn" class="form-label">User First Name:</label>
						<input id="fn" class="form-control" type="text" name="user_first_name">
						<label for="ln" class="form-label">User Last Name:</label> 
						<input id="ln" class="form-control" type="text" name="user_last_name">
						<label for="em" class="form-label">User Email:</label>
						<input id="em" class="form-control" type="email" name="user_email">
						<label for="psw" class="form-label">User Password:</label>
						<input id="psw" class="form-control" type="password" name="user_pass">
						<input class="btn btn-success mt-2" type="submit" value="Add User">
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
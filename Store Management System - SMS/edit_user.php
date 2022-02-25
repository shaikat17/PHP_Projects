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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
					<form action="edit_user.php" method="POST" autocomplete="off">
					<label for="ufn" class="form-label"></label>
					<input id="ufn" class="form-control" type="text" value="<?php echo $userFirstName ?>" name="user_first_name">
					<label for="uln" class="form-label"></label>
					<input id="uln" class="form-control" type="text" value="<?php echo $userLastName ?>" name="user_last_name"> 
					<input type="hidden" value="<?php echo $userID ?>" name="user_id">
					<label for="em" class="form-label"></label> 
					<input id="em" class="form-control" type="email" value="<?php echo $userEmail ?>" name="user_email">
					<label for="psw" class="form-label"></label>
					<input id="psw" class="form-control" type="password" value="<?php echo $userPass ?>" name="user_pass"><br><br>
					<input class="btn btn-success" type="submit" value="Update User">
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
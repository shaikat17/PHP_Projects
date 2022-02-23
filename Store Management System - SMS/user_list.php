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
	<title>View User</title>
</head>
<body>

	<?php 
		
		$sql = "SELECT * FROM users";

		$query = $conn->query($sql);

		// $data = mysqli_fetch_assoc($query);
		echo "<table border='1'><tr><th>User ID</th><th>User First Name</th><th>User Last Name</th><th>User Email</th><th>Action</th></tr>";

		while($data = mysqli_fetch_assoc($query)) {
			$userID = $data['user_id'];
			$userFirstName = $data['user_first_name'];
			$userLastname = $data['user_last_name'];
			$userEmail = $data['user_email'];

			echo "<tr>
					<td>$userID</td>
					<td>$userFirstName</td>
					<td>$userLastname</td>
					<td>$userEmail</td>
					<td><a href='edit_user.php?id=$userID'>Edit</a></td>
				</tr>";
		}

		echo "</table>";
	 ?>

	
</body>
</html>

<?php 
} else {
	header('location:login.php');
}

?>
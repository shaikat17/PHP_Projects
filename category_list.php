<?php
	require('connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Category List</title>
</head>
<body>

	<?php 
		
		$sql = "SELECT * FROM category";

		$query = $conn->query($sql);

		// $data = mysqli_fetch_assoc($query);
		echo "<table border='1'><tr><th>Category ID</th><th>Category Name</th><th>Entry Date</th><th>Action</th></tr>";

		while($data = mysqli_fetch_assoc($query)) {
			$ctID = $data['category_id'];
			$ctName = $data['category_name'];
			$ctEnDate = $data['category_entrydate'];

			echo "<tr>
					<td>$ctID</td>
					<td>$ctName</td>
					<td>$ctEnDate</td>
					<td><a href='edit_category.php?id=$ctID'>Edit</a></td>
				</tr>";
		}

		echo "</table>";
	 ?>

	
</body>
</html>
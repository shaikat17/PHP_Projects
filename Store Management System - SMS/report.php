<?php
	require('connection.php');

	session_start();

	$userEmail = $_SESSION['userEmail'];

	$sqlCat = "SELECT * FROM product";

	$queryCat = $conn->query($sqlCat);

	$data_list = array();

	while($dataCat = mysqli_fetch_assoc($queryCat)) {
		$pdId = $dataCat['product_id'];
		$pdName = $dataCat['product_name'];

		$data_list[$pdId] = $pdName;
	}

	if(!empty($userEmail)) {


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Report</title>
</head>
<body>

	<form action="report.php" method="POST" autocomplete="off">
		Select Product Name: <br>
		<select name="product_name">
		<?php

		$sql = "SELECT * FROM product";

		$query = $conn->query($sql);


		while($data = mysqli_fetch_array($query)) {
			$pdID = $data['product_id'];
			$pdName = $data['product_name'];

		?>
		
			<option value="<?php echo $pdID ?>"><?php echo $pdName ?></option>
		<?php } ?>
		</select>
		<input type="submit" value="Generate Report">
	</form>
	<h1>Store Product Report</h1>

	<?php 

		if(isset($_POST['product_name'])) {
			$productName = $_POST['product_name'];

			$sql1 = "SELECT * FROM store_product WHERE store_product_name = $productName";

			$query1 = $conn->query($sql1);

			echo "<table border='1'><tr><td>Store Date</td><td>Ammount</td></tr>";

			while($data1 = mysqli_fetch_assoc($query1)) {

			$store_product_name = $data1['store_product_name'];
			$store_product_quantity = $data1['store_product_quantity'];
			$store_product_entrydate = $data1['store_product_entrydate'];

			echo "<h2>$data_list[$store_product_name]</h2>";

			
			echo "<tr><td>$store_product_entrydate</td><td>$store_product_quantity</td></tr>";
		}
		echo "</table>";
		}
	 ?>

	 <h1>Spend Product Report</h1>

	 <?php 

		if(isset($_POST['product_name'])) {
			$productName = $_POST['product_name'];

			$sql2 = "SELECT * FROM spend_product WHERE spend_product_name = $productName";

			$query2 = $conn->query($sql2);

			echo "<table border='1'><tr><td>Spend Date</td><td>Ammount</td></tr>";

			while($data2 = mysqli_fetch_assoc($query2)) {

			$spend_product_name = $data2['spend_product_name'];
			$spend_product_quantity = $data2['spend_product_quantity'];
			$spend_product_entrydate = $data2['spend_product_entrydate'];

			echo "<h2>$data_list[$spend_product_name]</h2>";

			echo "<tr><td>$spend_product_entrydate</td><td>$spend_product_quantity</td></tr>";
			
		}
		echo "</table>";
		}
	 ?>

</body>
</html>

<?php 

} else {
	header('location:login.php');
}

?>
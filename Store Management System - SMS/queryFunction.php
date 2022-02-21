<?php

function data_list($table, $column1, $column2) {

	require('connection.php');

	$sql_ca = "SELECT * FROM $table";

	$query = $conn->query($sql_ca);

	while($data = mysqli_fetch_assoc($query)) {
				$data_name = $data[$column1];
				$data_id = $data[$column2];

					echo "<option value='$data_id'>$data_name</option>";
			}
}

?>
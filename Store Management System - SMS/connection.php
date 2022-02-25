<?php 

	$hostName = "localhost";
	$userName = "root";
	$pass = "";
	$dbName = "store_db";

	$conn = new mysqli($hostName, $userName, $pass, $dbName);

	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error); 
	}

 ?>
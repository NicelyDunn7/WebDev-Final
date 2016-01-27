<?php
	$servername = "dbhost-mysql.cs.missouri.edu";
	$username = "dpdbp7";
	$password = "qd9ASY8cWs";
	$dbname = "dpdbp7";
	$fname = $_POST["firstname"];
	$lname = $_POST["lastname"];
	$hometown = $_POST["hometown"];
	$highschool = $_POST["highschool"];
	$email = $_POST["email"];
	
	header("Location: http://babbage.cs.missouri.edu/~dpdbp7/final/home");
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	//Create query adding the potential rush into the database
	$sql = "INSERT INTO rushes VALUES ('$fname', '$lname', '$hometown', '$highschool', '$email')";
	$conn->query($sql);
	$conn->close();
?>

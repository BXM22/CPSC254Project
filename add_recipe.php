<?php
// Include database configuration
include 'db_config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Connect to the database
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	// Retrieve form data
	$title = $_POST["title"];
	$description = $_POST["description"];
	$ingredients = $_POST["ingredients"];
	$instructions = $_POST["instructions"];

	// Insert new recipe into the database
	$sql = "INSERT INTO Recipe (title, description, ingredients, instructions) VALUES ('$title', '$description', '$ingredients', '$instructions')";
	if ($conn->query($sql) === TRUE) {
    	echo "New recipe added successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close connection
	$conn->close();
}
?>

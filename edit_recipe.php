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
	$id = $_POST["id"];
	$title = $_POST["title"];
	$description = $_POST["description"];
	$ingredients = $_POST["ingredients"];
	$instructions = $_POST["instructions"];

	// Update recipe in the database
	$sql = "UPDATE Recipe SET title='$title', description='$description', ingredients='$ingredients', instructions='$instructions' WHERE id=$id";
	if ($conn->query($sql) === TRUE) {
    	echo "Recipe updated successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close connection
	$conn->close();
}
?>

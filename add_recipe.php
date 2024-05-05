<?php
// Include database configuration
require_once "db_config.php";

// Check if the add recipe form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve form data
	$title = $_POST["title"];
	$description = $_POST["description"];
	$user_id = $_POST["user_id"]; // Assuming you have user authentication implemented

	// Prepare SQL statement to insert recipe into the database
	$sql = "INSERT INTO recipes (title, description, user_id) VALUES (?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssi", $title, $description, $user_id);

	// Execute the statement
	if ($stmt->execute()) {
    	// Recipe added successfully, redirect to view recipes page or dashboard
    	header("Location: view_recipes.php");
    	exit();
	} else {
    	// Error occurred, display error message
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close statement
	$stmt->close();
}

// Close connection
$conn->close();
?>

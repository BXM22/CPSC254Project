<?php
// Include database configuration
require_once "db_config.php";

// Check if the edit recipe form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve form data
	$recipe_id = $_POST["recipe_id"];
	$title = $_POST["title"];
	$description = $_POST["description"];

	// Prepare SQL statement to update recipe in the database
	$sql = "UPDATE recipes SET title=?, description=? WHERE recipe_id=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssi", $title, $description, $recipe_id);

	// Execute the statement
	if ($stmt->execute()) {
    	// Recipe updated successfully, redirect to view recipes page or dashboard
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
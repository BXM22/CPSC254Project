<?php
// Include database configuration
require_once "db_config.php";

// Retrieve all recipes from the database
$sql = "SELECT * FROM recipes";
$result = $conn->query($sql);

// Check if there are any recipes
if ($result->num_rows > 0) {
	// Output data of each row
	while($row = $result->fetch_assoc()) {
    	echo "Recipe Title: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
	}
} else {
	echo "No recipes found";
}

// Close connection
$conn->close();
?>
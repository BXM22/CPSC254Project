<?php
// Include database configuration
include 'db_config.php';

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Query to fetch recipes
$sql = "SELECT * FROM Recipe";
$result = $conn->query($sql);

// Display recipes
if ($result->num_rows > 0) {
	echo "<h2>Recipes</h2>";
	echo "<ul>";
	while ($row = $result->fetch_assoc()) {
    	echo "<li>" . $row["title"] . " - " . $row["description"] . "</li>";
	}
	echo "</ul>";
} else {
	echo "No recipes found.";
}

// Close connection
$conn->close();
?>

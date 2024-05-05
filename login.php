<?php
// Include database configuration
require_once "db_config.php";

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve form data
	$username = $_POST["username"];
	$password = $_POST["password"];

	// Prepare SQL statement to retrieve user from the database
	$sql = "SELECT user_id, username, password FROM users WHERE username = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();

	// Check if user exists
	if ($result->num_rows == 1) {
    	// Fetch user data
    	$row = $result->fetch_assoc();
    	$user_id = $row["user_id"];
    	$hashed_password = $row["password"];

    	// Verify password
    	if ($password == $hashed_password) {
        	// Password is correct, start a session for the user
        	session_start();
        	$_SESSION["user_id"] = $user_id;
        	$_SESSION["username"] = $username;
        	header("Location: dashboard.html"); // Redirect to dashboard page
        	exit();
    	} else {
        	// Password is incorrect, display error message
        	echo "Incorrect password";
    	}
	} else {
    	// User does not exist, display error message
    	echo "User not found";
	}

	// Close statement
	$stmt->close();
}

// Close connection
$conn->close();
?>

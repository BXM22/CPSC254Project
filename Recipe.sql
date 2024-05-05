-- Create the Recipes database if it does not exist
CREATE DATABASE IF NOT EXISTS Recipes;

-- Use the Recipes database
USE Recipes;

-- Create a table to store recipe information
CREATE TABLE IF NOT EXISTS Recipe (
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
	description TEXT,
	ingredients TEXT,
	instructions TEXT,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

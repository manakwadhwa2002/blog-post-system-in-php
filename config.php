<?php 
	session_start();

	// connect to database
    $conn = mysqli_connect("localhost", "root", "", "test");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}

	define ('ROOT_PATH', realpath(dirname("D:\XAMPP\htdocs\Manak Projects\Blog Post Automation In PHP")));
	define('BASE_URL', 'http://localhost/Manak%20Projects/Blog%20Post%20Automation%20In%20PHP/');
?>
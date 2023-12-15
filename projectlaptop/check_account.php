<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "projectlaptop";

// Create a database connection
$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Kết nối CSDL thất bại: " . $connection->connect_error);
}

// Get user input
$user_name = $_POST['user_name'];
$password_input = $_POST['password'];

// Query the database for the user
$sql = "SELECT user_name, password FROM user WHERE user_name = '$user_name'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // User found, verify the password
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];

    if (password_verify($password_input, $hashed_password)) {
        // User authentication successful
        echo "success";
    } else {
        // Password verification failed
        echo "fail";
    }
} else {
    // User not found
    echo "fail";
}

$connection->close();
?>
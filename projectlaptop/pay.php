<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "projectlaptop";
$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection to the database failed: " . $connection->connect_error);
}

// Validate and sanitize user_id
$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;

// Check if $user_id is a valid integer
if ($user_id <= 0) {
    echo 'Error: Invalid user_id.';
    exit; // Stop further processing
}

$sqlInsertTransaction = "INSERT INTO transaction (cart_id, total_price, total_quantity, transaction_date, user_id)
SELECT c.id, c.total_price, c.total_quantity, NOW(), $user_id FROM cart AS c WHERE c.id = $user_id";



if ($connection->query($sqlInsertTransaction) === true) {
    // Successful
} else {
    echo 'Error: ' . $connection->error;
}

// Insert cart details into the transaction_detail table
$sqlInsertTransactionDetail = "INSERT INTO transaction_detail (transaction_id, product_id, quantity)
SELECT t.id, cd.product_id, cd.quantity
FROM transaction AS t
JOIN cart AS c ON t.cart_id = c.id
JOIN cart_detail AS cd ON cd.cart_id = c.id
WHERE t.cart_id= $user_id ";

if ($connection->query($sqlInsertTransactionDetail) === true) {
    // Thành công
} else {
    echo 'Error: ' . $connection->error;
}

// Clear the cart by deleting records from cart_detail
$sqlDeleteCartDetail = "DELETE FROM cart_detail WHERE cart_id = $user_id";

if ($connection->query($sqlDeleteCartDetail) === true) {
    // Thành công
} else {
    echo 'Error: ' . $connection->error;
}

$sqlDeleteCart = "UPDATE cart SET total_price = 0, total_quantity = 0 WHERE id = $user_id";

if ($connection->query($sqlDeleteCart) === true) {
    // Thành công
    echo 'success';
} else {
    echo 'Error: ' . $connection->error;
}

$connection->close();
?>
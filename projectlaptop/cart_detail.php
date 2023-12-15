<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "projectlaptop";
$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Kết nối CSDL thất bại: " . $connection->connect_error);
}

$productId = $_POST['product_id'];
$user_id = $_POST['user_id'];

// Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
$checkQuery = "SELECT * FROM cart_detail WHERE cart_id = $user_id AND product_id = $productId";
$checkResult = $connection->query($checkQuery);

if ($checkResult->num_rows > 0) {
    // Nếu sản phẩm đã tồn tại, cập nhật quantity lên 1
    $updateQuery = "UPDATE cart_detail SET quantity = quantity + 1 WHERE cart_id = $user_id AND product_id = $productId";
    if ($connection->query($updateQuery) === TRUE) {
        echo 'success';
    } else {
        echo 'error: ' . $connection->error;
    }
} else {
    // Nếu sản phẩm chưa tồn tại, thêm một bản ghi mới
    $insertQuery = "INSERT INTO cart_detail (cart_id, product_id, quantity) VALUES ($user_id, $productId, 1)";
    if ($connection->query($insertQuery) === TRUE) {
        echo 'success';
    } else {
        echo 'error: ' . $connection->error;
    }
}

// Recalculate the total_price and total_quantity in the cart
$sqlTotalPrice = "SELECT SUM(p.don_gia * cd.quantity) AS total_price, SUM(cd.quantity) AS total_quantity
FROM product p
RIGHT JOIN cart_detail cd ON p.id = cd.product_id AND cd.cart_id = $user_id";
$resultTotalPrice = $connection->query($sqlTotalPrice);

if (!$resultTotalPrice) {
    die("Lỗi truy vấn tổng giá: " . $connection->error);
}

$rowTotalPrice = $resultTotalPrice->fetch_assoc();
$totalPrice = $rowTotalPrice['total_price'];
$totalQuantity = $rowTotalPrice['total_quantity'];

$sqlUpdateCart = "UPDATE cart SET total_price = $totalPrice, total_quantity = $totalQuantity WHERE user_id = $user_id";

if ($connection->query($sqlUpdateCart) === TRUE) {
    echo '';
} else {
    echo 'Error: ' . $connection->error;
}

$connection->close();
?>
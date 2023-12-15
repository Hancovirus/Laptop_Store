<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "projectlaptop";
$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Kết nối CSDL thất bại: " . $connection->connect_error);
}

// Validate and sanitize user_id
$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;

// Check if $user_id is a valid integer
if ($user_id <= 0) {
    echo 'Error: Invalid user_id.';
    exit; // Stop further processing
}

$id = $_POST['id'];

// Lấy giá tiền của sản phẩm sẽ bị xóa
$getProductPriceQuery = "SELECT don_gia FROM product WHERE id = $id";
$productPriceResult = $connection->query($getProductPriceQuery);

if (!$productPriceResult) {
    die("Lỗi truy vấn giá tiền của sản phẩm: " . $connection->error);
}

$productPrice = $productPriceResult->fetch_assoc()['don_gia'];

// Xóa các dòng trong bảng 'cart_detail' có 'product_id' tương ứng
$deleteCartDetailQuery = "DELETE FROM cart_detail WHERE product_id = $id";
if ($connection->query($deleteCartDetailQuery) === TRUE) {
    // Lấy tổng giá tiền và tổng số lượng từ bảng 'cart_detail'
    $getCartTotalsQuery = "SELECT SUM(p.don_gia * cd.quantity) AS total_price, SUM(cd.quantity) AS total_quantity
        FROM product p
        RIGHT JOIN cart_detail cd ON p.id = cd.product_id AND cd.cart_id = $user_id";

    $cartTotalsResult = $connection->query($getCartTotalsQuery);

    if (!$cartTotalsResult) {
        die("Lỗi truy vấn tổng giá tiền và tổng số lượng trong bảng 'cart_detail': " . $connection->error);
    }

    $cartTotals = $cartTotalsResult->fetch_assoc();

    // Cập nhật 'total_price' và 'total_quantity' trong bảng 'cart'
    $updateCartQuery = "UPDATE cart SET total_price = " . intval($cartTotals['total_price']) . ", total_quantity = " . intval($cartTotals['total_quantity']) . " WHERE user_id = $user_id";

    if ($connection->query($updateCartQuery) === TRUE) {
        echo "success";
    } else {
        echo "Lỗi cập nhật 'total_price' và 'total_quantity' trong bảng 'cart': " . $connection->error;
    }
} else {
    echo "Lỗi xóa hàng trong bảng 'cart_detail': " . $connection->error;
}

// Đóng kết nối CSDL
$connection->close();
?>
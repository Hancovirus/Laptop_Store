<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $database = "projectlaptop";
    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Kết nối CSDL thất bại: " . $connection->connect_error);
    }

    // Xóa các dòng trong bảng 'product_category' có 'product_id' tương ứng
    $sql = "DELETE FROM product_category WHERE product_id = $id";
    if ($connection->query($sql) === TRUE) {
        // Sau khi xóa các dòng trong 'product_category', hãy tiếp tục xóa dòng trong bảng 'product'
        $sql = "DELETE FROM product WHERE id = $id";
        if ($connection->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "Lỗi xóa hàng trong bảng 'product': " . $connection->error;
        }
    } else {
        echo "Lỗi xóa hàng trong bảng 'product_category': " . $connection->error;
    }

    // Đóng kết nối CSDL
    $connection->close();
}
?>
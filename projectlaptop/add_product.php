<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "projectlaptop";
$connection = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($connection->connect_error) {
    die("Kết nối CSDL thất bại: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $productName = $_POST["name"];
    $cpu = $_POST["cpu"];
    $os = $_POST["os"];
    $screen = $_POST["screen"];
    $ram = $_POST["ram"];
    $price = $_POST["price"];
    $brandId = $_POST["brandId"];
    $image_url = $_POST["image_url"];
    $selectedCategories = $_POST["selectedCategoryIds"];

    // SQL INSERT INTO để thêm sản phẩm vào cơ sở dữ liệu
    $sqlInsertProduct = "INSERT INTO product (id, ten_san_pham, cpu, don_gia, he_dieu_hanh, man_hinh, ram, brandId,image_url)
            VALUES ('$id', '$productName', '$cpu', '$price', '$os', '$screen', '$ram', '$brandId','$image_url')";

    if ($connection->query($sqlInsertProduct) === TRUE) {
        // Lấy ID của sản phẩm vừa thêm
        $productId = $connection->insert_id;

        // SQL INSERT INTO để thêm các cặp (product_id, category_id) vào bảng product_category
        foreach ($selectedCategories as $categoryId) {
            $sqlInsertCategory = "INSERT INTO product_category (product_id, category_id)
                                  VALUES ('$productId', '$categoryId')";

            if ($connection->query($sqlInsertCategory) !== TRUE) {
                echo "Lỗi khi thêm vào bảng product_category: " . $connection->error;
                exit; // Thoát khỏi script nếu có lỗi
            }
        }

        echo "success";
    } else {
        echo "Lỗi khi thêm vào bảng product: " . $connection->error;
    }

    $connection->close();
}
?>
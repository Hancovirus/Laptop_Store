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

// Xử lý sự kiện khi nhấn nút "Lưu" trong biểu mẫu chỉnh sửa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $updatedProduct = $_POST["updatedProduct"];
    $updatedCPU = $_POST["updatedCPU"];
    $updatedSystem = $_POST["updatedSystem"];
    $updatedMonitor = $_POST["updatedMonitor"];
    $updatedRAM = $_POST["updatedRAM"];
    $updatedPrice = $_POST["updatedPrice"];

    // Xử lý upload hình ảnh
    $imagePath = ""; // Đường dẫn của hình ảnh sau khi upload

    if (isset($_FILES['updatedImage']) && $_FILES['updatedImage']['error'] == 0) {
        $targetDir = "images/"; // Đường dẫn thư mục lưu trữ hình ảnh
        $targetFile = $targetDir . basename($_FILES['updatedImage']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Kiểm tra định dạng hình ảnh
        if (in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
            if (move_uploaded_file($_FILES['updatedImage']['tmp_name'], $targetFile)) {
                $imagePath = $targetFile;

                // Cập nhật URL hình ảnh trong cơ sở dữ liệu
                $updateImageURL = "UPDATE product SET image_url='$imagePath' WHERE id=$id";
                if ($connection->query($updateImageURL) !== TRUE) {
                    echo "Lỗi cập nhật URL hình ảnh: " . $connection->error;
                    exit;
                }
            } else {
                echo "Lỗi upload hình ảnh.";
                exit;
            }
        } else {
            echo "Chỉ chấp nhận hình ảnh có định dạng JPG, JPEG, PNG, GIF.";
            exit;
        }
    }

    // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
    $sql = "UPDATE product SET ten_san_pham='$updatedProduct', cpu='$updatedCPU', he_dieu_hanh='$updatedSystem', man_hinh='$updatedMonitor', ram='$updatedRAM', don_gia='$updatedPrice' WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo "Thông tin sản phẩm đã được cập nhật thành công.";
    } else {
        echo "Lỗi cập nhật thông tin sản phẩm: " . $connection->error;
    }
}

$connection->close();
?>
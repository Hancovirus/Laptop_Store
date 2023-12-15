<?php
// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "projectlaptop";
$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Kết nối CSDL thất bại: " . $connection->connect_error);
}

// Lấy mã danh mục từ yêu cầu Ajax
$categoryId = $_POST['categoryId'];

// Truy vấn CSDL để lấy danh sách sản phẩm dựa trên mã danh mục
$sql = "SELECT id,ten_san_pham,cpu,he_dieu_hanh,man_hinh,ram,don_gia,image_url
        FROM product p
        INNER JOIN product_category pc ON p.id = pc.product_id
        WHERE pc.category_id  = $categoryId";
$result = $connection->query($sql);

if (!$result) {
    die("Lỗi truy vấn: " . $connection->error);
}

// Tạo danh sách sản phẩm dưới dạng HTML và trả về cho Ajax
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td class='image-cell'><img src='" . $row["image_url"] . "' alt='Hình ảnh sản phẩm' style='max-width: 200px; max-height: 200px;'></td>";
    echo "<td >" . $row["ten_san_pham"] . "</td>";
    echo "<td>" . $row["cpu"] . "</td>";
    echo "<td>" . $row["he_dieu_hanh"] . "</td>";
    echo "<td>" . $row["man_hinh"] . "</td>";
    echo "<td>" . $row["ram"] . "</td>";
    echo "<td>" . $row["don_gia"] . "</td>";
    echo "<td>
                            <button class='btn btn-primary btn-sm buy-button' data-id='{$row['id']}'>Buy</button>
                            </td>";
    echo "</tr>";
}

// Đóng kết nối CSDL
$connection->close();
?>
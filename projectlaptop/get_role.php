<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "projectlaptop";
// Create a database connection
$connection = new mysqli($servername, $username, $password, $database);
// Get user input
$user_name = $_POST['user_name'];

if ($connection->connect_error) {
    die(json_encode(['status' => 'fail', 'error' => 'Kết nối CSDL thất bại: ' . $connection->connect_error]));
}

// Truy vấn tới roleid
$sql = "SELECT roleid, id FROM user WHERE user_name = '$user_name'";
$result = $connection->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        // Truy xuất thành công
        $row = $result->fetch_assoc();
        echo json_encode(['status' => 'success', 'roleid' => $row['roleid'], 'id' => $row['id']]);
    } else {
        // Truy xuất thất bại
        echo json_encode(['status' => 'fail', 'error' => 'Không có dữ liệu với tên người dùng đã cho.']);
    }
} else {
    // Truy xuất thất bại
    echo json_encode(['status' => 'fail', 'error' => 'Lỗi truy vấn: ' . $connection->error]);
}

$connection->close();
?>
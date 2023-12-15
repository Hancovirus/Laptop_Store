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
    $name = $_POST["name"];
    $userName = $_POST["user_name"];
    $phoneNumber = $_POST["phone_number"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // SQL INSERT INTO để thêm account vào database
    $sql = "INSERT INTO user (name, user_name, phone_number, address, email, password, roleid)
            VALUES ('$name', '$userName', '$phoneNumber', '$address', '$email', '$hashedPassword', 1)";

    if ($connection->query($sql) === TRUE) {
        // Lấy ID của người dùng vừa thêm vào
        $user_id = $connection->insert_id;

        // Tạo một giỏ hàng mới cho người dùng
        $cart_sql = "INSERT INTO cart (id,total_price, total_quantity, user_id)
                     VALUES ($user_id,0, 0, $user_id)";

        if ($connection->query($cart_sql) === TRUE) {
            echo "success";
        } else {
            echo "Lỗi khi tạo giỏ hàng: " . $cart_sql . "<br>" . $connection->error;
        }
    } else {
        echo "Lỗi khi tạo tài khoản: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <!-- fonts links -->

</head>

<body>
    <style>
        body {
            margin-top: 180px;
        }

        .fixed-top {
            height: 56px;
            background-color: #f8f9fa;
        }
    </style>
    <!-- top navbar -->
    <div class="fixed-top">
        <div class="top-navbar  bg-white">
            <p>WELCOME TO OUR SHOP</p>
            <div class="icons">
                <a href="login.php"><img src="./images/register.png" alt="" width="18px">Login</a>
                <a href="register.php"><img src="./images/register.png" alt="" width="18px">Register</a>
            </div>
        </div>
        <!-- top navbar -->

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="" id="logo"><span id="span1">E</span>Lectronic <span>Shop</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span><img src="./images/menu.png" alt="" width="30px"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/projectlaptop/admin.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/projectlaptop/transaction.php">Transaction</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/projectlaptop/account.php">Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar -->
    </div>






    <!-- table -->
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table  table-hover table-bordered table-striped" id="sortable-table">
                <thead>
                    <tr class="table-dark">
                        <th data-sort="date">Date</th>
                        <th data-sort="text">Name</th>
                        <th data-sort="number">Phone Number</th>
                        <th data-sort="text">Email</th>
                        <th data-sort="number">Quantity</th>
                        <th data-sort="number">Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "12345678";
                    $database = "projectlaptop";
                    $connection = new mysqli($servername, $username, $password, $database);

                    if ($connection->connect_error) {
                        die("Kết nối CSDL thất bại: " . $connection->connect_error);
                    }

                    // Lấy thông tin sản phẩm và quantity từ bảng product và cart_detail
                    $sql = "SELECT t.id,t.transaction_date,name,phone_number,email,t.total_quantity,t.total_price
                    FROM transaction AS t
                    JOIN user on t.user_id=user.id
                    ORDER BY t.transaction_date DESC"; // 
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Lỗi truy vấn: " . $connection->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td >" . $row["transaction_date"] . "</td>";
                        echo "<td >" . $row["name"] . "</td>";
                        echo "<td >" . $row["phone_number"] . "</td>";
                        echo "<td >" . $row["email"] . "</td>";
                        echo "<td>" . $row["total_quantity"] . "</td>";
                        echo "<td>" . $row["total_price"] . "</td>";
                        echo "<td>
                            <a href='history_product.php?transactionId={$row['id']}' class='btn btn-primary btn-sm detail-button'>Detail</a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- table -->






    <!-- offer -->
    <div class="container" id="offer">
        <div class="row">
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-cart-shopping"></i>
                <h3>Free Shipping</h3>
                <p>On order over $1000</p>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-rotate-left"></i>
                <h3>Free Returns</h3>
                <p>Within 30 days</p>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-truck"></i>
                <h3>Fast Delivery</h3>
                <p>World Wide</p>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-thumbs-up"></i>
                <h3>Big choice</h3>
                <p>Of products</p>
            </div>
        </div>
    </div>
    <!-- offer -->
    <!-- footer -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Electronic Shop</h3>
                        <strong>Phone:</strong> +000000000000000 <br>
                        <strong>Email:</strong> electronicshop@.com <br>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Usefull Links</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Privacy policey</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><a href="#">PS 5</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Gaming Laptop</a></li>
                            <li><a href="#">Mobile Phone</a></li>
                            <li><a href="#">Gaming Gadget</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>

                        <div class="socail-links mt-3">
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-skype"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <hr>
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Electronic Shop</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="#">SA coding</a>
            </div>
        </div>
    </footer>
    <!-- footer -->









    <a href="#" class="arrow"><i><img src="./images/arrow.png" alt=""></i></a>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="admin.js"></script>
</body>

</html>
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
    <div class="fixed-top">
        <!-- top navbar -->
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                                style="background-color: rgb(67 0 86)" id="categoryMenu">
                                <li><a class="dropdown-item" href="#" data-categoryid="1">Văn Phòng</a></li>
                                <li><a class="dropdown-item" href="#" data-categoryid="2"> Gaming</a></li>
                                <li><a class="dropdown-item" href="#" data-categoryid="3">Mỏng nhẹ</a></li>
                                <li><a class="dropdown-item" href="#" data-categoryid="4">Đồ họa</a></li>
                                <li><a class="dropdown-item" href="#" data-categoryid="5">Sinh Viên</a></li>
                                <li><a class="dropdown-item" href="#" data-categoryid="6">Cảm ứng</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Brand
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                                style="background-color: rgb(67 0 86)" id="brandMenu">
                                <li><a class="dropdown-item" href="#" data-brandid="1">Mac</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="2">Asus</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="3">MSI</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="4">Lenovo</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="5">HP</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="6">Acer</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="7">Xiaomi</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="8">Microsoft</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="9">LG</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="10">Huawei</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="11">Dell</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="12">Gigabyte</a></li>
                                <li><a class="dropdown-item" href="#" data-brandid="12">Vaio</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/projectlaptop/transaction.php">Transaction</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/projectlaptop/account.php">Account</a>
                        </li>
                    </ul>

                    <form class="d-flex" id="search" style="width: 600px;">
                        <input type="text" id="productNameFilter" class="form-control"
                            placeholder="">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
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
                        <th data-sort="text">Picture</th>
                        <th data-sort="text">Product</th>
                        <th data-sort="text">CPU</th>
                        <th data-sort="text">System</th>
                        <th data-sort="text">Monitor</th>
                        <th data-sort="text">RAM</th>
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

                    $sql = "SELECT id,ten_san_pham,cpu,he_dieu_hanh,man_hinh,ram,don_gia,image_url FROM product";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Lỗi truy vấn: " . $connection->error);
                    }

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
                            <button class='btn btn-primary btn-sm update-button' data-id='{$row['id']}'>Update</button>
                            <button class='btn btn-danger btn-sm delete-button' data-id='{$row['id']}'>Delete</button>
                            <button class='btn btn-success btn-sm save-button' style='display: none;' data-id='{$row['id']}'>Lưu</button>
                            <button class='btn btn-secondary btn-sm cancel-button' style='display: none;'>Hủy</button>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- table -->



    <!-- Form to add a new product with each field on a new line -->
    <div class="container mt-3">

        <button id="show-add-product-form" class="btn btn-primary">Add new product</button>

        <div id="add-product-form-container" style="display: none;">
            <h2>Thêm sản phẩm mới</h2>
            <form id="add-product-form">
                <div class="form-group">
                    <label for="newProductId">ID sản phẩm:</label>
                    <input type="text" id="newProductId" class="form-control" placeholder="ID sản phẩm">
                </div>
                <div class="form-group">
                    <label for="newProductName">Tên sản phẩm:</label>
                    <input type="text" id="newProductName" class="form-control" placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="newProductCPU">CPU:</label>
                    <input type="text" id="newProductCPU" class="form-control" placeholder="CPU">
                </div>
                <div class="form-group">
                    <label for="newProductOS">Hệ điều hành:</label>
                    <input type="text" id="newProductOS" class="form-control" placeholder="Hệ điều hành">
                </div>
                <div class="form-group">
                    <label for="newProductScreen">Màn hình:</label>
                    <input type="text" id="newProductScreen" class="form-control" placeholder="Màn hình">
                </div>
                <div class="form-group">
                    <label for="newProductRAM">RAM:</label>
                    <input type="text" id="newProductRAM" class="form-control" placeholder="RAM">
                </div>
                <div class="form-group">
                    <label for="newProductPrice">Giá:</label>
                    <input type="text" id="newProductPrice" class="form-control" placeholder="Giá">
                </div>

                <!-- Thêm thuộc tính 'data' cho tất cả các ô đánh dấu -->
                <div class="form-group">
                    <label>Brand:</label>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="1" name="brand" data-brand="Mac">
                        <label class="form-check-label" for="brand1">Mac</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="2" name="brand" data-brand="Asus">
                        <label class="form-check-label" for="brand2">Asus</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="3" name="brand" data-brand="MSI">
                        <label class="form-check-label" for="brand3">MSI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="4" name="brand"
                            data-brand="Lenovo">
                        <label class="form-check-label" for="brand4">Lenovo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="5" name="brand" data-brand="HP">
                        <label class="form-check-label" for="brand5">HP</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="6" name="brand" data-brand="Acer">
                        <label class="form-check-label" for="brand6">Acer</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="7" name="brand"
                            data-brand="Xiaomi">
                        <label class="form-check-label" for="brand7">Xiaomi</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="8" name="brand"
                            data-brand="Microsoft">
                        <label class="form-check-label" for="brand8">Microsoft</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="9" name="brand" data-brand="LG">
                        <label class="form-check-label" for="brand9">LG</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="10" name="brand"
                            data-brand="Huawei">
                        <label class="form-check-label" for="brand10">Huawei</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="11" name="brand" data-brand="Dell">
                        <label class="form-check-label" for="brand11">Dell</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="12" name="brand"
                            data-brand="Gigabyte">
                        <label class="form-check-label" for="brand12">Gigabyte</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-radio" type="radio" id="13" name="brand" data-brand="Vaio">
                        <label class="form-check-label" for="brand13">Vaio</label>
                    </div>
                    <!-- Thêm các radio button khác tùy thuộc vào số lượng các brand -->
                </div>

                <div class="form-group">
                    <label>Danh mục:</label>
                    <div class="form-check">
                        <input class="form-check-input category-checkbox" type="checkbox" id="1" name="category[]">
                        <label class="form-check-label" for="category1">Văn phòng</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input category-checkbox" type="checkbox" id="2" name="category[]">
                        <label class="form-check-label" for="category2">Gaming</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input category-checkbox" type="checkbox" id="3" name="category[]">
                        <label class="form-check-label" for="category3">Mỏng nhẹ</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input category-checkbox" type="checkbox" id="4" name="category[]">
                        <label class="form-check-label" for="category4">Đồ họa</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input category-checkbox" type="checkbox" id="5" name="category[]">
                        <label class="form-check-label" for="category5">Sinh viên</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input category-checkbox" type="checkbox" id="6" name="category[]">
                        <label class="form-check-label" for="category6">Cảm ứng</label>
                    </div>
                </div>
                <!-- Thêm trường chọn hình ảnh -->
                <div class="form-group">
                    <label for="newProductImage">Chọn hình ảnh từ thư mục:</label>
                    <input type="file" id="newProductImage" class="form-control-file" name="productImage">
                </div>


                <div class="form-group">
                    <button class="btn btn-success add-button">Thêm</button>
                    <button class="btn btn-secondary cancel-button">Hủy</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Form to add a new product with each field on a new line -->


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
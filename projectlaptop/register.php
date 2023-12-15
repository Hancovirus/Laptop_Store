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
      margin-top: 100px;
    }

    .fixed-top {
      height: 56px;
      background-color: #f8f9fa;
    }
  </style>


  <form id="signup-form" action="add_account.php" method="POST">
    <div class="container" id="login">
      <div class="row">
        <div class="col-md-5 py-3 py-md-0" id="side1">
          <h3 class="text-center">Register</h3>
        </div>
        <div class="col-md-7 py-3 py-md-0" id="side2">
          <h3 class="text-center">Create Account</h3>
          <div class="input2 text-center">
            <input type="text" name="name" id="name" placeholder="Name">
            <input type="text" name="user_name" id="user_name" placeholder="User Name">
            <input type="text" name="phone_number" id="phone_number" placeholder="Phone">
            <input type="text" name="address" id="address" placeholder="Address">
            <input type="text" name="email" id="email" placeholder="Email">
            <input type="text" name="password" id="password" placeholder="Password">
          </div>
          <p class="text-center" id="btnlogin"><a href="#" id="signup-button">SIGN UP</a></p>
          <p class="text-center">Already have an account? <a href="login.php"> Login </a></p>
        </div>
      </div>
    </div>
  </form>


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
  <script>
    $(document).ready(function () {
      // Handle form submission
      $("#signup-button").on("click", function (e) {
        e.preventDefault(); // Prevent the default form submission
        var formData = $("#signup-form").serialize();

        if (confirm("Bạn muốn tạo tài khoản?")) {
          // Submit the form using AJAX
          $.ajax({
            type: 'POST',
            url: "add_account.php",
            data: formData,
            success: function (response) {
              if (response === 'success') {
                alert('Đăng ký thành công!');
                window.location.href = "login.php";
              } else {
                alert('Lỗi đăng ký: ' + response);
              }
            }
          });
        }
      });
    });
  </script>
</body>

</html>
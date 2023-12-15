$(document).ready(function () {
  // Hàm để lấy tham số URL
  function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return "";
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }

  // Lấy ID từ URL
  var userId = getParameterByName("id");

  // Lấy liên kết "Cart" theo ID
  var cartLink = document.getElementById("cartLink");

  // Kiểm tra nếu userId không null hoặc undefined
  if (userId !== null && userId !== undefined) {
    // Cập nhật href của liên kết "Cart" để chuyển tiếp sang cart.php với userId
    cartLink.href = "http://localhost/projectlaptop/cart.php?id=" + userId;
  }

  var productLink = document.getElementById("productLink");

  // Kiểm tra nếu userId không null hoặc undefined
  if (userId !== null && userId !== undefined) {
    // Cập nhật href của liên kết "Cart" để chuyển tiếp sang cart.php với userId
    productLink.href = "http://localhost/projectlaptop/user.php?id=" + userId;
  }

  var historyLink = document.getElementById("historyLink");

  // Kiểm tra nếu userId không null hoặc undefined
  if (userId !== null && userId !== undefined) {
    // Cập nhật href của liên kết "Cart" để chuyển tiếp sang cart.php với userId
    historyLink.href =
      "http://localhost/projectlaptop/history.php?id=" + userId;
  }

  $("#search").on("submit", function (event) {
    event.preventDefault();
    var searchTerm = $("#productNameFilter").val().toLowerCase();
    var table = $("#sortable-table");

    table
      .find("tbody > tr")
      .hide()
      .filter(function () {
        var productName = $(this).find("td").eq(1).text().toLowerCase();
        return productName.includes(searchTerm);
      })
      .show();
  });

  $("#sortable-table th").click(function () {
    var table = $("#sortable-table");
    var column = $(this);
    var sortType = column.data("sort");
    var rows = table.find("tbody > tr").toArray();
    var isDescending = column.hasClass("sort-desc");

    rows.sort(function (a, b) {
      var aValue = $(a).find("td").eq(column.index()).text();
      var bValue = $(b).find("td").eq(column.index()).text();
      if (sortType === "number") {
        if (isDescending) {
          return parseFloat(bValue) - parseFloat(aValue); // Sắp xếp từ lớn đến bé
        } else {
          return parseFloat(aValue) - parseFloat(bValue); // Sắp xếp từ bé đến lớn
        }
      } else {
        if (isDescending) {
          return bValue.localeCompare(aValue); // Sắp xếp từ lớn đến bé cho kiểu văn bản
        } else {
          return aValue.localeCompare(bValue); // Sắp xếp từ bé đến lớn cho kiểu văn bản
        }
      }
    });
    table.find("th").removeClass("sort-desc");
    if (isDescending) {
      column.removeClass("sort-desc");
    } else {
      column.addClass("sort-desc");
    }
    table.find("tbody").empty().append(rows);
  });

  // Function to handle the "Buy" button click
  $("#sortable-table").on("click", "button.buy-button", function () {
    var productId = $(this).data("id"); // Lấy product_id từ nút "Buy"
    // Lấy user ID từ URL
    var user_id = getParameterByName("id");
    // Sử dụng AJAX để tạo một cart_detail
    $.ajax({
      type: "POST",
      url: "cart_detail.php", // Thay thế bằng tên tệp xử lý yêu cầu của bạn
      data: { product_id: productId, user_id: user_id },
      success: function (response) {
        if (response === "success") {
          alert("Đã thêm sản phẩm vào giỏ hàng thành công.");
        } else {
          alert("Lỗi thêm sản phẩm vào giỏ hàng: " + response);
        }
      },
    });
  });

  // Đối với danh mục
  $("#categoryMenu a").click(function (e) {
    e.preventDefault();
    var table = $("#sortable-table");
    var categoryId = $(this).data("categoryid");
    $.ajax({
      type: "POST",
      url: "user_get_category.php",
      data: { categoryId: categoryId },
      success: function (response) {
        $("#sortable-table tbody").html(response);
      },
    });
  });

  // Event handler for brand menu click
  $("#brandMenu a").click(function (e) {
    e.preventDefault();
    var table = $("#sortable-table");
    var brandId = $(this).data("brandid");
    $.ajax({
      type: "POST",
      url: "user_get_brand.php",
      data: { brandId: brandId },
      success: function (response) {
        $("#sortable-table tbody").html(response);
        // Reattach the event handler after updating the content
        handleBuyButtonClick();
      },
    });
  });
  // Add an event handler for the "Checkout" button
  $("#checkout-button").click(function () {
    // Hàm để lấy tham số URL
    var user_id = getParameterByName("id");

    console.log("user_id:", user_id); // Debugging line

    if (confirm("Bạn có chắc muốn thanh toán không?")) {
      // Sử dụng AJAX để gửi yêu cầu đến tệp 'pay.php' để xử lý quá trình thanh toán
      $.ajax({
        type: "POST",
        url: "pay.php", // Đường dẫn tới tệp 'pay.php'
        data: { user_id: user_id }, // Bao gồm userId trong dữ liệu
        success: function (response) {
          // Xử lý phản hồi từ 'pay.php' như cần
          if (response === "success") {
            alert("Thanh toán thành công.");
            location.reload(); // Tải lại trang sau khi thanh toán
          } else {
            alert("Lỗi thanh toán: " + response);
          }
        },
        error: function (xhr, status, error) {
          alert("Yêu cầu AJAX thất bại với lỗi: " + error);
        },
      });
    }
  });
  // Use event delegation to handle dynamically generated delete buttons
  $("#sortable-table").on("click", "button.delete-button", function () {
    var id = $(this).data("id");
    var user_id = getParameterByName("id");
    // Hiển thị một hộp thoại xác nhận
    if (confirm("Bạn có chắc muốn xóa mục này không?")) {
      // Gửi yêu cầu xóa bằng phương thức POST sử dụng AJAX
      $.ajax({
        type: "POST",
        url: "delete_cart.php",
        data: { id: id, user_id: user_id },
        success: function (response) {
          if (response === "success") {
            // Xử lý thành công, ví dụ: cập nhật giao diện người dùng
            alert("Xóa thành công");
            // Tải lại trang hoặc cập nhật bảng dữ liệu
            location.reload();
          } else {
            // Xử lý lỗi, ví dụ: hiển thị thông báo lỗi
            alert("Lỗi xóa hàng: " + response);
          }
        },
      });
    }
  });
});

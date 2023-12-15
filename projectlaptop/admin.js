$(document).ready(function () {
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

  // Đối với danh mục
  $("#categoryMenu a").click(function (e) {
    e.preventDefault();
    var table = $("#sortable-table");
    var categoryId = $(this).data("categoryid");
    $.ajax({
      type: "POST",
      url: "get_category.php",
      data: { categoryId: categoryId },
      success: function (response) {
        $("#sortable-table tbody").html(response);
      },
    });
  });

  // Đối với thương hiệu
  $("#brandMenu a").click(function (e) {
    e.preventDefault();
    var table = $("#sortable-table");
    var brandId = $(this).data("brandid");
    $.ajax({
      type: "POST",
      url: "get_brand.php",
      data: { brandId: brandId },
      success: function (response) {
        $("#sortable-table tbody").html(response);
      },
    });
  });

  // Lắng nghe sự kiện khi nút "Thêm sản phẩm" được nhấn
  document
    .getElementById("show-add-product-form")
    .addEventListener("click", function (event) {
      // Ẩn nút "Thêm sản phẩm"
      this.style.display = "none";

      // Hiển thị mẫu thêm sản phẩm
      document.getElementById("add-product-form-container").style.display =
        "block";
    });

  // Mã JavaScript để xử lý sự kiện nhấn nút "Hủy"
  $(".cancel-button").click(function () {
    // Ẩn biểu mẫu
    $("#add-product-form-container").hide();
    // Xóa các trường của biểu mẫu để thiết lập lại chúng
    $("#add-product-form")[0].reset();
    // Hiển thị lại nút "Thêm sản phẩm"
    $("#show-add-product-form").show();
  });

  var selectedCategories = [];

  $(".category-checkbox").change(function () {
    var categoryId = $(this).attr("id");

    if ($(this).prop("checked")) {
      // Nếu checkbox được chọn, thêm categoryId vào mảng selectedCategories
      selectedCategories.push(categoryId);
    } else {
      // Nếu checkbox bị hủy chọn, loại bỏ categoryId khỏi mảng selectedCategories
      var index = selectedCategories.indexOf(categoryId);
      if (index !== -1) {
        selectedCategories.splice(index, 1);
      }
    }
  });

  var selectedBrandId;

  $(".brand-radio").change(function () {
    selectedBrandId = $(this).attr("id");
  });

  $(".add-button").click(function () {
    var id = $("#newProductId").val();
    var name = $("#newProductName").val();
    var cpu = $("#newProductCPU").val();
    var os = $("#newProductOS").val();
    var screen = $("#newProductScreen").val();
    var ram = $("#newProductRAM").val();
    var price = $("#newProductPrice").val();
    var fileInput = $("#newProductImage")[0];
    var imageFileName =
      fileInput.files.length > 0 ? fileInput.files[0].name : "";
    var image_url = imageFileName ? "images/" + imageFileName : "";
    if (confirm("Bạn có chắc muốn thêm mục này không?")) {
      // Gửi yêu cầu xóa bằng phương thức POST sử dụng AJAX
      $.ajax({
        type: "POST",
        url: "add_product.php", // Thay thế bằng tên tệp xử lý yêu cầu của bạn
        data: {
          id: id,
          name: name,
          cpu: cpu,
          os: os,
          screen: screen,
          ram: ram,
          price: price,
          brandId: selectedBrandId,
          image_url: image_url,
          selectedCategoryIds: selectedCategories,
        },
        success: function (response) {
          if (response === "success") {
            // Xử lý thành công, ví dụ: cập nhật giao diện người dùng
            alert("Thêm thành công");
            // Tải lại trang hoặc cập nhật bảng dữ liệu
            location.reload();
          } else {
            // Xử lý lỗi, ví dụ: hiển thị thông báo lỗi
            alert("Lỗi thêm hàng: " + response);
          }
        },
      });
    }
  });

  $("#sortable-table").on("click", "button.delete-button", function () {
    var id = $(this).data("id");

    // Hiển thị một hộp thoại xác nhận
    if (confirm("Bạn có chắc muốn xóa mục này không?")) {
      // Gửi yêu cầu xóa bằng phương thức POST sử dụng AJAX
      $.ajax({
        type: "POST",
        url: "delete.php",
        data: { id: id },
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

  /// Tạo một biến lưu trạng thái ban đầu của các ô
  var initialData = {};
  // Bắt sự kiện khi nút "Update" được nhấn
  $("#sortable-table").on("click", "button.update-button", function () {
    var row = $(this).closest("tr");

    // Lưu giá trị ban đầu vào biến initialData
    initialData.image = row.find("td:eq(0) img").attr("src");

    // Cho phép chỉnh sửa trực tiếp trong các ô, trừ cột hình ảnh
    var editableCells = row.find(
      "td:eq(1), td:eq(2), td:eq(3), td:eq(4), td:eq(5)"
    );
    editableCells.attr("contenteditable", true);

    // Thay thế cột hình ảnh bằng form chọn hình ảnh
    var imageCell = row.find("td:eq(0)");
    imageCell.html(
      "<form id='imageForm' enctype='multipart/form-data'><input type='file' class='form-control-file' id='imageInput' accept='image/*'></form>"
    );

    // Ẩn nút "Update" và "Delete" và hiển thị nút "Lưu" và "Hủy"
    row.find(".update-button, .delete-button").hide();
    row.find(".save-button, .cancel-button").show();
  });

  // Bắt sự kiện khi nút "Hủy" được nhấn
  $("#sortable-table").on("click", "button.cancel-button", function () {
    var row = $(this).closest("tr");

    // Lặp qua các ô để đặt lại giá trị về giá trị ban đầu
    var editableCells = row.find(
      "td:eq(1), td:eq(2), td:eq(3), td:eq(4), td:eq(5)"
    );
    editableCells.each(function (index) {
      var cell = $(this);
      cell.text(initialData[index]);
    });

    // Tắt chế độ chỉnh sửa trực tiếp
    editableCells.attr("contenteditable", false);

    // Chuyển cột hình ảnh về hiển thị hình ảnh ban đầu
    var imageCell = row.find("td:eq(0)");
    imageCell.html(
      "<img src='" +
        initialData.image +
        "' alt='Hình ảnh sản phẩm' style='max-width: 200px; max-height: 200px;'>"
    );

    // Chuyển nút "Lưu" và "Hủy" thành nút "Update" và "Delete"
    row.find(".save-button, .cancel-button").hide();
    row.find(".update-button, .delete-button").show();
  });

  // Bắt sự kiện khi nút "Lưu" được nhấn
  $("#sortable-table").on("click", "button.save-button", function () {
    var row = $(this).closest("tr");
    var id = row.find(".update-button").data("id"); // Lấy ID từ thuộc tính data-id của nút "Update"

    // Lấy giá trị của input chọn hình ảnh
    var updatedImage = row.find("#imageInput")[0].files[0];

    // Sử dụng FormData để gửi dữ liệu (bao gồm cả hình ảnh)
    var formData = new FormData();
    formData.append("id", id);

    // Lưu tên file mới (nếu có)
    if (updatedImage) {
      var newImageName = "images/" + updatedImage.name;
      formData.append("updatedImage", updatedImage, newImageName);
    }

    // Lấy các giá trị đã sửa từ các ô
    var updatedProduct = row.find("td:eq(1)").text(); // Lấy giá trị văn bản thay vì input
    var updatedCPU = row.find("td:eq(2)").text();
    var updatedSystem = row.find("td:eq(3)").text();
    var updatedMonitor = row.find("td:eq(4)").text();
    var updatedRAM = row.find("td:eq(5)").text();
    var updatedPrice = row.find("td:eq(6)").text();

    formData.append("updatedProduct", updatedProduct);
    formData.append("updatedCPU", updatedCPU);
    formData.append("updatedSystem", updatedSystem);
    formData.append("updatedMonitor", updatedMonitor);
    formData.append("updatedRAM", updatedRAM);
    formData.append("updatedPrice", updatedPrice);

    // Sử dụng AJAX để gửi dữ liệu cập nhật đến tệp PHP
    $.ajax({
      type: "POST",
      url: "update_product.php",
      data: formData,
      processData: false, // Important: tell jQuery not to process the data
      contentType: false, // Important: tell jQuery not to set contentType
      success: function (response) {
        alert(response); // Hiển thị thông báo từ tệp PHP
        //location.reload(); // Reload the web page
      },
    });

    // Chuyển nút "Lưu" và "Hủy" thành nút "Update" và "Delete"
    row.find(".save-button, .cancel-button").hide();
    row.find(".update-button, .delete-button").show();
  });
});

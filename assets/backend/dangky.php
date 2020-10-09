<!-- rang buoc du lieu phia client -->
<?php include_once(__DIR__.'/../../backend/scripts.php'); ?>

<script>
    $(document).ready(function() {
      $("#form_dangky").validate({
        rules: {
            txtHoTen: {
            required: true,
            minlength: 3,
            maxlength: 50
          },
          txtEmail: {
            required: true,
          },
          txtsodienthoai: {
            required: true,
            minlength: 10,
            maxlength: 10
          }
        },
        messages: {
          txtHoTen: {
            required: "Vui lòng nhập Họ tên !",
            minlength: "Họ tên phải chứa tối thiểu 3 ký tự !",
            maxlength: "Họ tên chứa tối đa 50 ký tự !"
          },
          txtEmail: {
            required: "Vui lòng nhập email !",
          },
          txtsodienthoai: {
            required: "Vui lòng nhập mô tả cho Loại sản phẩm",
            minlength: "Mô tả cho Loại sản phẩm phải có ít nhất 3 ký tự",
            maxlength: "Mô tả cho Loại sản phẩm không được vượt quá 255 ký tự"
          },
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
          // Thêm class `invalid-feedback` cho field đang có lỗi
          error.addClass("invalid-feedback");
          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
          } else {
            error.insertAfter(element);
          }
        },
        success: function(label, element) {},
        highlight: function(element, errorClass, validClass) {
          $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).addClass("is-valid").removeClass("is-invalid");
        }
      });
    });
  </script>
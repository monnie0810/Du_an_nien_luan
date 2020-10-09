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
          category_name: {
            required: true,
            minlength: 3,
            maxlength: 50
          },
          description: {
            required: true,
            minlength: 3,
            maxlength: 255
          }
        },
        messages: {
          category_code: {
            required: "Vui lòng nhập Họ tên !",
            minlength: "Họ tên phải chứa tối thiểu 3 ký tự",
            maxlength: "Họ tên chứa tối đa 50 ký tự"
          },
          category_name: {
            required: "Vui lòng nhập tên Loại sản phẩm",
            minlength: "Tên Loại sản phẩm phải có ít nhất 3 ký tự",
            maxlength: "Tên Loại sản phẩm không được vượt quá 50 ký tự"
          },
          description: {
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
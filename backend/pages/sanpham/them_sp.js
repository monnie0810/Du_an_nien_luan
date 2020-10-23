$(document).ready(function() {
    $("#form_themsp").validate({
        rules: {
            txttensp: {
                required: true,
            },
            txtmausp: {
                required: true,
            },
            txtslnhap: {
                required: true,
                digits: true,
            },
            txtkichthuoc: {
                required: true,

            },
            txtgianhap: {
                required: true,
                digits: true,
            },
            txtgiaban: {
                required: true,
                digits: true,
            },
        },
        messages: {
            txttensp: {
                required: "Vui lòng nhập tên sản phẩm !",
            },
            txtmausp: {
                required: "Vui lòng nhập màu sản phẩm !",
            },
            txtslnhap: {
                required: "Vui lòng nhập số lượng sản phẩm !",
                digits: "Số lượng nhập không hợp lệ !",
            },
            txtkichthuoc: {
                required: "Vui lòng nhập kích thước sản phẩm !",
            },
            txtgianhap: {
                required: "Vui lòng nhập giá nhập hàng của sản phẩm !",
                digits: "Giá nhập hàng không hợp lệ !",
            },
            txtgiaban: {
                required: "Vui lòng nhập giá bán sản phẩm !",
                digits: "Giá bán không hợp lệ !",
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
    $("#Form_suath").validate({
        rules: {
            txttenth_sua: {
                required: true,
            },
        },
        messages: {
            txttenth_sua: {
                required: "Vui lòng nhập tên thương hiệu !",
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
<?php
if (session_id() === '') {
    
    session_start();
} 
if(!isset($_SESSION['user'])){
    header("location: /Du_an_nien_luan/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monnie Store - Tất cả sản phẩm</title>
    <?php include_once(__DIR__.'/../../styles.php'); ?>
    <link rel="stylesheet" href="/Du_an_nien_luan/assets/pages/index.css" type="text/css " />
    <link rel="stylesheet" href="/Du_an_nien_luan/assets/pages/tatcasanpham.css" type="text/css " />
    <link href="/Du_an_nien_luan/assets/partials/header.css" type=" text/css" rel="stylesheet " />

    <style>
    .user_khachhang span {
        color: #FACC2E;
        font-weight: bold;
    }

    .user_khachhang {
        text-align: center;
        padding-top: 7px;
    }

    .xemthem_sp a {
        font-size: 15px;
        color: #6E6E6E;
        /* #FA8258; */
        vertical-align: middle;

    }
    </style>
</head>

<body>
    <div class="container-fluid ">

        <!-- start navbar-header -->
        <?php include_once(__DIR__.'/../../partials/header.php'); ?>
        <!-- end navbar-header -->
        <!-- duong dan  -->
        <div class="row duongdan_row">
            <div class="col-md-2"></div>
            <div class="col-md-8 duongdan">
                <ul style="list-style-type: none;">
                    <li class="duongdan_truoc">
                        <a href="/Du_an_nien_luan/index.php"><span>Trang chủ</span> </a>
                    </li>

                    <li class="duongdan_hientai">
                        <a href="#"> <span>Giỏ hàng</span> </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2"></div>

        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" id="app">
                <div class="row ">
                    <div class="col-md-6 title_cardsp">
                        <span>Tất cả sản phẩm</span>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">

                    </div>

                </div>
                <div class="row ">

                    <?php   
                        include_once(__DIR__ . '/../../../dbconnect.php');
                        $giohangdata = [];
                        if (isset($_SESSION['giohangdata'])) {
                            $giohangdata = $_SESSION['giohangdata'];
                        } else {
                            $giohangdata = [];
                        }
                        ?>

                    <div class="container mt-4">
                        <!-- Vùng ALERT hiển thị thông báo -->
                        <div id="alert-container" class="alert alert-warning alert-dismissible fade d-none"
                            role="alert">
                            <div id="thongbao">&nbsp;</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="row">
                            <div class="col col-md-12">
                                <?php if (!empty($giohangdata)) : ?>
                                <table id="tblGioHang" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datarow">
                                        <?php $stt = 1; ?>
                                        <?php foreach ($giohangdata as $sanpham) : ?>
                                        <tr>
                                            <td><?= $stt ?></td>
                                            <td>
                                                <?php if (empty($sanpham['hinhdaidien'])) : ?>
                                                <img src="/Du_an_nien_luan/assets/img/Image_default.jpg"
                                                    class="img-fluid hinhdaidien" />
                                                <?php else : ?>
                                                <img src="/Du_an_nien_luan/assets/img/upload_img/<?= $sanpham['hinhdaidien'] ?>"
                                                    class="img-fluid hinhdaidien" />
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $sanpham['sp_ten'] ?></td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    id="soluong_<?= $sanpham['sp_ma'] ?>" name="soluong"
                                                    value="<?= $sanpham['soluong'] ?>" />
                                                <button class="btn btn-primary btn-sm btn-capnhat-soluong"
                                                    data-sp-ma="<?= $sanpham['sp_ma'] ?>">Cập nhật</button>
                                            </td>
                                            <td><?= number_format($sanpham['gia'], 2, ".", ",")?> vnđ</td>
                                            <td><?= number_format($sanpham['soluong'] * $sanpham['gia'], 2, ".", ",")?>
                                                vnđ</td>
                                            <td>
                                                <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                                                <a id="delete_<?= $stt ?>" data-sp-ma="<?= $sanpham['sp_ma'] ?>"
                                                    class="btn btn-danger btn-delete-sanpham">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php else : ?>
                                <h2>Giỏ hàng rỗng!!!</h2>
                                <?php endif; ?>
                                <a href="/php/myhand/frontend" class="btn btn-warning btn-md"><i
                                        class="fa fa-arrow-left" aria-hidden="true"></i> Quay
                                    về trang chủ</a>
                                <a href="/php/myhand/frontend/thanhtoan/thanhtoan.php" class="btn btn-primary btn-md"><i
                                        class="fa fa-shopping-cart" aria-hidden="true"></i> Thanh toán</a>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
            <div class="col-md-1"></div>
        </div>


        <!-- start footer  -->
        <?php include_once(__DIR__.'/../../partials/footer.php'); ?>
        <!-- end footer  -->

    </div>


    <!-- end slider home -->
    <?php include_once(__DIR__.'/../../scripts.php'); ?>

    <!-- form đăng nhập -->
    <?php include_once(__DIR__.'/../../partials/dangnhap_popup.php'); ?>
  
    <script>
        $(document).ready(function() {
            function removeSanPhamVaoGioHang(id) {
                // Dữ liệu gởi
                var dulieugoi = {
                    sp_ma: id
                };

                // AJAX đến API xóa sản phẩm khỏi Giỏ hàng trong Session
                $.ajax({
                    url: '/php/myhand/frontend/api/giohang-xoasanpham.php',
                    method: "POST",
                    dataType: 'json',
                    data: dulieugoi,
                    success: function(data) {
                        // Refresh lại trang
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        var htmlString = `<h1>Không thể xử lý</h1>`;
                        $('#thongbao').html(htmlString);
                        // Hiện thông báo
                        $('.alert').removeClass('d-none').addClass('show');
                    }
                });
            };

            // Đăng ký sự kiện cho các nút đang sử dụng class .btn-delete-sanpham
            $('#tblGioHang').on('click', '.btn-delete-sanpham', function(event) {
                // debugger;
                event.preventDefault();
                var id = $(this).data('sp-ma');

                console.log(id);
                removeSanPhamVaoGioHang(id);
            });

            // Cập nhật số lượng trong Giỏ hảng
            function capnhatSanPhamTrongGioHang(id, soluong) {
                // Dữ liệu gởi
                var dulieugoi = {
                    sp_ma: id,
                    soluong: soluong
                };

                $.ajax({
                    url: '/php/myhand/frontend/api/giohang-capnhatsanpham.php',
                    method: "POST",
                    dataType: 'json',
                    data: dulieugoi,
                    success: function(data) {
                        // Refresh lại trang
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        var htmlString = `<h1>Không thể xử lý</h1>`;
                        $('#thongbao').html(htmlString);
                        // Hiện thông báo
                        $('.alert').removeClass('d-none').addClass('show');
                    }
                });
            };
            $('#tblGioHang').on('click', '.btn-capnhat-soluong', function(event) {
                // debugger;
                event.preventDefault();
                var id = $(this).data('sp-ma');
                var soluongmoi = $('#soluong_' + id).val();
                capnhatSanPhamTrongGioHang(id, soluongmoi);
            });
        });
    </script>


</body>

</html>
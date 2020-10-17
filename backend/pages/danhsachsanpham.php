<?php
if (session_id() === '') {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon Store - Danh sách sản phẩm</title>
    <?php include_once(__DIR__.'/../../backend/styles.php'); ?>
    <link rel="stylesheet" href="/Du_an_nien_luan/assets/pages/index.css" type="text/css " />
    <link href="/Du_an_nien_luan/assets/partials/header_admin.css" type=" text/css" rel="stylesheet " />
    <link rel="stylesheet" href="/Du_an_nien_luan/assets/vendor/Chart/Chart.min.css">

    <style>
    .user_khachhang span {
        color: #FACC2E;
        font-weight: bold;
    }

    .user_khachhang {
        text-align: center;
        padding-top: 7px;

    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- start navbar-header -->
        <?php include_once(__DIR__.'/../../backend/partials/header_admin.php'); ?>
        <!-- end navbar-header -->

        <div class="row">
            <div class="col-md-1"></div>
            <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Bảng tin DASHBOARD</h1>
                </div>
                <!-- Block content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-primary mb-2">
                                <div class="card-body pb-0">
                                    <div class="text-value" id="baocaoSanPham_SoLuong">
                                        <h1>0</h1>
                                    </div>
                                    <div>Tổng số mặt hàng</div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm form-control" id="refreshBaoCaoSanPham">Refresh dữ
                                liệu</button>
                        </div> <!-- Tổng số mặt hàng -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-success mb-2">
                                <div class="card-body pb-0">
                                    <div class="text-value" id="baocaoKhachHang_SoLuong">
                                        <h1>0</h1>
                                    </div>
                                    <div>Tổng số khách hàng</div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-sm form-control" id="refreshBaoCaoKhachHang">Refresh dữ
                                liệu</button>
                        </div> <!-- Tổng số khách hàng -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-warning mb-2">
                                <div class="card-body pb-0">
                                    <div class="text-value" id="baocaoDonHang_SoLuong">
                                        <h1>0</h1>
                                    </div>
                                    <div>Tổng số đơn hàng</div>
                                </div>
                            </div>
                            <button class="btn btn-warning btn-sm form-control" id="refreshBaoCaoDonHang">Refresh dữ
                                liệu</button>
                        </div> <!-- Tổng số đơn hàng -->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-danger mb-2">
                                <div class="card-body pb-0">
                                    <div class="text-value" id="baocaoGopY_SoLuong">
                                        <h1>0</h1>
                                    </div>
                                    <div>Tổng số góp ý</div>
                                </div>
                            </div>
                            <button class="btn btn-danger btn-sm form-control" id="refreshBaoCaoGopY">Refresh dữ
                                liệu</button>
                        </div> <!-- Tổng số góp ý -->
                        <div id="ketqua"></div>
                    </div><!-- row -->
                    <div class="row">
                        <!-- Biểu đồ thống kê loại sản phẩm -->
                        <div class="col-sm-6 col-lg-6">
                            <canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas>
                            <button class="btn btn-outline-primary btn-sm form-control"
                                id="refreshThongKeLoaiSanPham">Refresh dữ liệu</button>
                        </div><!-- col -->
                    </div><!-- row -->
                </div>
                <!-- End block content -->
            </main>
            <div class="col-md-1"></div>
        </div>
    </div>

     <!-- start footer  -->
     <?php include_once(__DIR__.'/../../backend/partials/footer.php'); ?>
        <!-- end footer  -->
    <!-- end slider home -->
    <?php include_once(__DIR__.'/../../backend/scripts.php'); ?>
    <!-- Liên kết thư viện ChartJS -->
    <script src="/Du_an_nien_luan/assets/vendor/Chart/Chart.min.js"></script>
    <!-- Bat su kien -->
    <script>
    $(document).ready(function() {
        // ----------------- Tổng số mặt hàng --------------------------
        function getDuLieuBaoCaoTongSoMatHang() {
            // tong so mat hang 
            $.ajax('/PHP_project/backend/api/baocao_tongsomathang.php', {
                success: function(data) {
                    var dataObj = JSON.parse(data);
                    var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
                    $('#baocaoSanPham_SoLuong').html(htmlString);
                },
                error: function() {
                    var htmlString = `<h1>Không thể xử lý</h1>`;
                    $('#baocaoSanPham_SoLuong').html(htmlString);
                }
            });
        }
        $('#refreshBaoCaoSanPham').click(function(event) {
            event.preventDefault();
            getDuLieuBaoCaoTongSoMatHang();
        });
        // ----------------- Tổng số khach hang--------------------------
        function getDuLieuBaoCaoTongSoKhachHang() {
            // tong so khach hang php 
            $.ajax('/PHP_project/backend/api/baocao_tongsokhachhang.php', {
                success: function(data) {
                    var dataObj = JSON.parse(data);
                    var htmlString = `<h1>${dataObj.Soluong}</h1>`;
                    $('#baocaoKhachHang_SoLuong').html(htmlString);
                },
                error: function() {
                    var htmlString = `<h1>Không thể xử lý</h1>`;
                    $('#baocaoKhachHang_SoLuong').html(htmlString);
                }
            });
        }
        $('#refreshBaoCaoKhachHang').click(function(event) {
            event.preventDefault();
            getDuLieuBaoCaoTongSoKhachHang();
        });
        // ----------------- Tổng số don hang--------------------------
        // ----------------- Tổng số gop y--------------------------
        // ----------------- Bieu do thong ke--------------------------
        var $objChartThongKeLoaiSanPham;
        var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham")
            .getContext(
                "2d");

        function renderChartThongKeLoaiSanPham() {
            $.ajax({
                url: '/PHP_project/backend/api/baocao_tongsomathang.php',
                type: "GET",
                success: function(response) {
                    var data = JSON.parse(response);
                    var myLabels = [];
                    var myData = [];
                    $(data).each(function() {
                        myLabels.push((this.TenLoaiSanPham));
                        myData.push(this.SoLuong);
                    });
                    myData.push(0); // tạo dòng số liệu 0
                    if (typeof $objChartThongKeLoaiSanPham !== "undefined") {
                        $objChartThongKeLoaiSanPham.destroy();
                    }
                    $objChartThongKeLoaiSanPham = new Chart($chartOfobjChartThongKeLoaiSanPham, {
                        // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
                        type: "bar",
                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                borderColor: "#9ad0f5",
                                backgroundColor: "#9ad0f5",
                                borderWidth: 1
                            }]
                        },
                        // Cấu hình dành cho biểu đồ của ChartJS
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Thống kê Loại sản phẩm"
                            },
                            responsive: true
                        }
                    });
                }
            });
        };
        $('#refreshThongKeLoaiSanPham').click(function(event) {
            event.preventDefault();
            renderChartThongKeLoaiSanPham();
        });
        // ----------------- Ajax tu goi ham de nguoi dung khong can bam refesh--------------------------
        getDuLieuBaoCaoTongSoMatHang();
        getDuLieuBaoCaoTongSoKhachHang();
        renderChartThongKeLoaiSanPham();
    });
    </script>







    


       


</body>

</html>
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
    <title>Monnie Store - Thêm sản phẩm</title>
    <?php include_once(__DIR__.'/../../styles.php'); ?>
    <link rel="stylesheet" href="/Du_an_nien_luan/assets/pages/dangky.css" type="text/css " />

</head>

<body>
    <div class="container-fluid ">
        <?php include_once(__DIR__.'/../../partials/header.php'); ?>


        <!-- duong dan  -->
        <div class="row duongdan_row">
            <div class="col-md-2"></div>
            <div class="col-md-8 duongdan">
                <ul style="list-style-type: none;">
                    <li class="duongdan_truoc">
                        <a href="../HtmlFile/index.html"><span>Trang chủ</span> </a>
                    </li>

                    <li class="duongdan_hientai">
                        <a href="../HtmlFile/dang_ky.html"> <span>Thêm loại sản phẩm</span> </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2"></div>

        </div>
        <!-- content dang nhap -->
        <!-- trang dang ky  -->
        <div class="row ">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row trang_dangky">
                    <div class="col-md-12 dangky_form">
                        <!-- form dang ky du lieu  -->
                        <form name="form_dangky" id="form_dangky" action="/Du_an_nien_luan/assets/backend/dangky.php"
                            method="POST">
                            <div class="row title_formdangky">
                                <div class="col-md-12">
                                    <h4>Nhập thông tin sản phẩm </h4>
                                </div>
                            </div>
                            <div class="row body_formdangky">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txtHoTen">Tên sản phẩm:</label>
                                        <input type="text" class="form-control" name="txttensp" id="txttensp"
                                            aria-describedby="nameHelp" placeholder="Tên sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtHoTen">Màu sắc</label>
                                        <input type="text" class="form-control" name="txtmausp" id="txtmausp"
                                            aria-describedby="nameHelp" placeholder="Màu sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtHoTen">Số lượng nhập kho</label>
                                        <input type="number" class="form-control" name="txtslnhap" id="txtslnhap"
                                            aria-describedby="nameHelp" placeholder="Số lượng sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtHoTen">Kích thước</label>
                                        <input type="number" class="form-control" name="txtkichthuoc" id="txtkichthuoc"
                                            aria-describedby="nameHelp" placeholder="Số lượng sản phẩm">
                                    </div>
                                    <!-- select loai san pham va thuong hieu -->
                                    <?php
                                    include_once(__DIR__.'/../../../dbconnect.php'); 
                                    $sql=

                                      ?>
                                    <div class="form-group">
                                        <label for="txtHoTen">Loại sản phẩm</label>
                                        <input type="number" class="form-control" name="txtkichthuoc" id="txtkichthuoc"
                                            aria-describedby="nameHelp" placeholder="Số lượng sản phẩm">
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="txtHoTen">Giá nhập sẩn phẩm:</label>
                                        <input type="number" class="form-control" name="txtgianhap" id="txtgianhap"
                                            aria-describedby="nameHelp" placeholder="Giá nhập sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtHoTen">Giá bán sẩn phẩm:</label>
                                        <input type="number" class="form-control" name="txtgiaban" id="txtgiaban"
                                            aria-describedby="nameHelp" placeholder="Giá bán sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtHoTen">Mô tả sản phẩm:</label>
                                        <input type="textarea" class="form-control" name="txtmotasp" id="txtmotasp"
                                            aria-describedby="nameHelp" placeholder="Mô tả sản phẩm">
                                    </div>

                                </div>
                            </div>
                            <div class="row submit_formdangky">
                                <div class="col-md-12">
                                    <button type="submit" name="btnthem" id="btnthem" class="btn">Thêm sản phẩm</button>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <?php
                                    if(isset( $_SESSION["thongbao"])){
                                        echo  $_SESSION["thongbao"];
                                        session_unset();
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

        <?php include_once(__DIR__.'/../../partials/footer.php'); ?>





        <?php include_once(__DIR__.'/../../scripts.php'); ?>


        <!-- file xu ly rang buoc du lieu phia client -->
        <script src="/Du_an_nien_luan/assets/script/dangky.js"></script>


</body>

</html>
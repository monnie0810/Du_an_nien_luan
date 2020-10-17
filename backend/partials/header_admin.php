<?php
    include_once(__DIR__.'/../scripts.php'); 
    include_once(__DIR__.'/../styles.php'); 
    include_once(__DIR__.'/../../dbconnect.php'); 
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
?>

<link href="/Du_an_nien_luan/assets/partials/header_admin.css" type=" text/css" rel="stylesheet " />

<div class="row header ">
    <div class="col-md-4 search-button ">
        <form class="form-inline d-flex  form-sm active-white active-cyan-2 ml-auto justify-content-center">
            <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <img src="/Du_an_nien_luan/assets/img/icon&logo/search-icon.png" alt="">
            </a>
            <div class="collapse" id="collapseExample">
                <input class="form-control form-control-sm mr-3 w-0" type="text" placeholder="Search"
                    aria-label="Search">
            </div>
        </form>

    </div>
    <div class="col-md-4 ">
        <div class="row">
            <div class="col-md-12 logo-header animate__animated animate__flipInX">
                <img src="/Du_an_nien_luan/assets/img/icon&logo/logo.PNG " class="animate__jello">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 user_khachhang">
                <?php if (isset($_SESSION["user"])):?>
                <?php
                    $sql="select * from thanhvien where tv_sdt =". $_SESSION["user"];
                    $result = mysqli_query($conn,$sql);
                    $data = [];
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $data[] = array(
                            'tv_ten' => $row['tv_ten'],
                        );
                    }?>
                <?php foreach($data as $thanhvien): ?>
                <span ><?= $thanhvien['tv_ten']; ?> </span>
                <?php endforeach; ?>
                <?php endif; ?>


            </div>
        </div>
    </div>
    <div class="col-md-4 header-icon ">
        <div class="row ">
            <div class="col-md-12 icon-button ">

                <div class="row justify-content-center">
                    <!-- ------------------------------------------------------- -->
                    <?php if (isset($_SESSION["user"])):?>
                    <div class="col-md-6 danhnhap-button">
                        <a href="#" tabindex="-1" data-target="#exampleModal">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <span>giỏ hàng</span>
                        </a>
                    </div>
                    <div class="col-md-6 giohang-button ">
                        <a href="/Du_an_nien_luan/assets/backend/dangxuat.php">
                            <i class="fa fa-share-square-o" aria-hidden="true"></i>
                            <span> Đăng xuất</span>
                        </a>
                    </div>
                    <?php else : ?>
                    <!-- ------------------------------------------------------- -->
                    <div class="col-md-6 danhnhap-button">
                        <a href="#" tabindex="-1" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <span>Đăng nhập </span>
                        </a>
                    </div>
                    <div class="col-md-6 giohang-button ">
                        <a href="#">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <span> Giỏ hàng</span>
                        </a>
                    </div>
                    <?php endif; ?>
                    <!-- ------------------------------------------ -->

                </div>
            </div>

        </div>
    </div>
</div>
<!-- start navbar-header -->
<div class="sticky-top">
    <div class="row navbar-header ">
        <div class="col-md-12">
            <ul class="nav justify-content-center ">
                <li class="navbar-header ">
                    <a class="nav-link active item-navbar " href="/Du_an_nien_luan/index.php ">Đơn hàng</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link item-navbar " href="/Du_an_nien_luan/backend/pages/gioithieu.php">Doanh thu</a>
                </li>
                <li class="nav-item sanpham-block ">
                    <a class="nav-link item-navbar " href="#">Quản lý</a>
                    <div class="sanpham-content ">
                        <div class="sanpham-level ">

                            <ul style="list-style-type:none; ">
                                <li>
                                    <i class="fa fa-angle-right " aria-hidden="true "></i>
                                    <a href="../HtmlFile/san_pham.html">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <i class="fa fa-angle-right " aria-hidden="true "></i>
                                    <a href="../HtmlFile/san_pham.html">Danh sách loại sản phẩm</a>
                                </li>
                                <li>
                                    <i class="fa fa-angle-right " aria-hidden="true "></i>
                                    <a href="../HtmlFile/san_pham.html">Danh sách thương hiệu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link item-navbar " href="/Du_an_nien_luan/backend/pages/lienhe.php">Thành viên</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end navbar-header -->
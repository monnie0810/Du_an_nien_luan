<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon Store - Trang chủ</title>
    <?php include_once(__DIR__.'/backend/styles.php'); ?>
    <link rel="stylesheet" href="/Du_an_nien_luan/assets/pages/index.css" type="text/css " />
</head>

<body>

    <div class="container-fluid ">
        <?php include_once(__DIR__.'/backend/partials/header.php'); ?>
        <!-- end navbar-header -->
        <!-- noi dung san pham -->

        <!-- slider anh home -->
        <?php include_once(__DIR__.'/backend/partials/hinh_index.php'); ?>

        <!-- start main content -->
        <!-- end main content  -->
        <div id="app">
            <!-- danh mục sản phẩm -->
            <div class="row ">
                <div class="col-md-2 ">

                </div>
                <div class="col-md-8 ">
                    <!--start gioi thieu chinh sach -->
                    <?php include_once(__DIR__.'/backend/partials/hotro.php'); ?>
                    <!--start gioi thieu chinh sach -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 title_danhmuc">
                                    <span>SẢN PHẨM BÁN CHẠY</span> <br>
                                    <img src="/Du_an_nien_luan/assets/img/icon&logo/icon_product.PNG" alt="">

                                </div>
                            </div>
                            <div class="row danhmuc_sp">
                                <div class="col-md-6 danhmuc_col1">
                                    <div class="img_col">
                                        <a href="../HtmlFile/san_pham.html">
                                            <img src="/Du_an_nien_luan/assets/img/icon&logo/banner_col_2.jpg" alt="">
                                            <Span>Shop nữ</Span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 danhmuc_col1">
                                            <div class="img_col">
                                                <a href="../HtmlFile/san_pham.html">
                                                    <img src="/Du_an_nien_luan/assets/img/icon&logo/banner_col_3.jpg"
                                                        alt="">
                                                    <Span>Shop nam</Span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row ">
                                                <div class="col-md-12 danhmuc_col2">
                                                    <a href="../HtmlFile/san_pham.html">
                                                        <img src="/Du_an_nien_luan/assets/img/icon&logo/banner_col_4.jpg"
                                                            alt="">
                                                        <Span>Deal hot</Span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 danhmuc_col3">
                                                    <a href="../HtmlFile/san_pham.html">
                                                        <img src="/Du_an_nien_luan/assets/img/icon&logo/banner_col_1.jpg"
                                                            alt="">
                                                        <Span>Giảm giá</Span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tuan deal hot  -->
                    <div class="row card_sanpham">
                        <div class="col-md-12">
                            <div class="row ">
                                <div class="col-md-6 title_cardsp">
                                    <span>TUẦN DEAL HOT</span>
                                </div>
                                <div class="col-md-4 xemthem_cardsp">
                                    <a href="">Xem thêm sản phẩm >></a>
                                </div>
                                <div class="col-md-2">
                                    <div class="thanhngang"></div>
                                </div>
                            </div>
                            <!-- -------------hien thi san pham----------------------- -->
                            <div class="row row-cols-1 row-cols-md-4 row_sanpham">
                                <div class="col div_card " v-for="item in listNews_sphamhot ">
                                    <news-item v-bind:obj="item " v-bind:key="item.id "></news-item>
                                </div>
                            </div>
                            <!-- --------------------------------------- -->
                        </div>
                    </div>


                </div>
                <div class="col-md-2 ">

                </div>
            </div>

            <div class="row giamgiasau_area">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- giam gia sau -->
                    <div class="row row_giamgiasau">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 title_danhmuc">
                                    <span>GIẢM GIÁ SÂU</span> <br>
                                    <div class="row giamgiasau_icon ">
                                        <div class="col-md-12">
                                            <a href="" style="margin-right: 46px;">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                            </a>
                                            <a href="">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- -----------hien thi san pham----------- -->
                            <div class="row row-cols-1 row-cols-md-4 row_sanpham">
                                <div class="col div_card " v-for="item in listNews_danhchonam ">
                                    <news-item v-bind:obj="item " v-bind:key="item.id "></news-item>
                                </div>
                            </div>
                            <!-- --------------------------------------- -->
                        </div>

                    </div>
                </div>
                <div class="col-md-2"></div>

            </div>
            <!-- Danh muc noi bat -->
            <div class="row ">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- Mục bán chạy -->
                    <div class="row card_sanpham">
                        <div class="col-md-12">
                            <div class="row ">
                                <div class="col-md-6 title_cardsp">
                                    <span>MỤC BÁN CHẠY</span>
                                </div>
                                <div class="col-md-4 xemthem_cardsp">
                                    <a href="">Xem thêm sản phẩm >></a>
                                </div>
                                <div class="col-md-2">
                                    <div class="thanhngang"></div>
                                </div>
                            </div>

                            <!-- -------------hien thi san pham---------- -->
                            <div class="row row-cols-1 row-cols-md-4 row_sanpham">
                                <div class="col div_card " v-for="item in listNews_danhchonu ">
                                    <news-item v-bind:obj="item " v-bind:key="item.id "></news-item>
                                </div>
                            </div>
                            <!-- --------------------------------------- -->
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <!-- start khu vuc quang cao  -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row quangcao_area">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 title_danhmuc">
                                    <span>TIN TỨC</span> <br>
                                    <div class="row giamgiasau_icon ">
                                        <div class="col-md-12">
                                            <a href="" style="margin-right: 46px;">
                                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                            </a>
                                            <a href="">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <?php include_once(__DIR__.'/backend/partials/quangcao.php'); ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <!-- end khu vuc quang cao  -->
            <!-- start footer  -->
            <?php include_once(__DIR__.'/backend/partials/footer.php'); ?>
            <!-- end footer  -->


        </div>
    </div>


    <!-- end slider home -->


    <!-- form đăng nhập -->
    <?php include_once(__DIR__.'/../backend/partials/dangnhap_popup.php'); ?>
    <!-- end form đăng nhập -->
    <?php include_once(__DIR__.'/backend/scripts.php'); ?>

</body>

</html>
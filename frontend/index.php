
    <div class="container-fluid ">
        <?php include_once(__DIR__.'/../backend/layouts/partials/header.php'); ?>
        <!-- end navbar-header -->
        <!-- noi dung san pham -->

        <!-- slider anh home -->
        <?php include_once(__DIR__.'/../backend/layouts/partials/hinh_index.php'); ?>

        <!-- start main content -->
        <!-- end main content  -->
        <div id="app">
            <!-- danh mục sản phẩm -->
            <div class="row ">
                <div class="col-md-2 ">

                </div>
                <div class="col-md-8 ">
                    <!--start gioi thieu chinh sach -->
                    <?php include_once(__DIR__.'/../backend/layouts/partials/hotro.php'); ?>
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
                                                    <img src="/Du_an_nien_luan/assets/img/icon&logo/banner_col_3.jpg" alt="">
                                                    <Span>Shop nam</Span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row ">
                                                <div class="col-md-12 danhmuc_col2">
                                                    <a href="../HtmlFile/san_pham.html">
                                                        <img src="/Du_an_nien_luan/assets/img/icon&logo/banner_col_4.jpg" alt="">
                                                        <Span>Deal hot</Span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 danhmuc_col3">
                                                    <a href="../HtmlFile/san_pham.html">
                                                        <img src="/Du_an_nien_luan/assets/img/icon&logo/banner_col_1.jpg" alt="">
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
                            <!-- ------------------------------------ -->
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
                            <!-- ------------------------------------ -->
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

                            <!-- ------------------------------------ -->
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
                                <?php include_once(__DIR__.'/../backend/layouts/partials/quangcao.php'); ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <!-- end khu vuc quang cao  -->
            <!-- start footer  -->
            <?php include_once(__DIR__.'/../backend/layouts/partials/footer.php'); ?>
            <!-- end footer  -->


        </div>
    </div>


    <!-- end slider home -->


    <!-- form đăng nhập -->
    <div id="app1">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form name="FormContact" id="FormContact" action="" method="POST" onsubmit="return check_Submit()">

                        <div class="modal-header">
                            <h5 class="modal-title title-dangnhap" id="exampleModalLabel">Đăng nhập vào MoonStore.com
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- start form dang nhap -->
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Số điện thoại:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="Phonenumber-user"
                                        name="Phonenumber-user" placeholder="phone number">
                                </div>
                                <div class="alert hotro_form" role="alert" id="help_numberphone"
                                    style="color: red; font-size: 12px;">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Mật khẩu:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control" id="Password-user" name="Password-user"
                                        placeholder="Password">
                                </div>
                                <div class="alert hotro_form" role="alert" id="help_pass"
                                    style="color: red; font-size: 12px;">

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                                <label class="form-check-label" for="autoSizingCheck2">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Đăng nhập</button>
                            <a class="btn btn-outline-success" href="dang_ky.html" role="button">Đăng ký</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end form đăng nhập -->
    <?php include_once(__DIR__.'/../backend/layouts/scripts.php'); ?>




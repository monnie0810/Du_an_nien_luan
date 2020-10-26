<?php
  if(!isset($_SESSION)) { 
    session_start(); 
} 
include_once(__DIR__.'/../../dbconnect.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monnie Store - Chi tiết sản phẩm</title>
    <?php include_once(__DIR__.'/../styles.php'); ?>
    <link rel="stylesheet" href="/Du_an_nien_luan/assets/pages/index.css" type="text/css " />
    <link rel="stylesheet" href="/Du_an_nien_luan/assets/pages/chitiet_sanpham.css" type="text/css " />
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
    .sl_dathang{
        margin-top: 15px;
    }
    </style>
</head>

<body>
    <div class="container-fluid ">
        <!-- start navbar-header -->
        <?php include_once(__DIR__.'/../partials/header.php'); ?>
        <!-- end navbar-header -->

        <!-- duong dan  -->
        <div class="row duongdan_row">
            <div class="col-md-2"></div>
            <div class="col-md-8 duongdan">
                <ul style="list-style-type: none;">
                    <li class="duongdan_truoc">
                        <a href="/Du_an_nien_luan/index.php"><span>Trang chủ</span> </a>
                    </li>
                    <li class="duongdan_truoc">
                        <a href="/Du_an_nien_luan/backend/pages/tatcasanpham.php?page=1"><span>Danh sách sản phẩm</span> </a>
                    </li>

                    <li class="duongdan_hientai">
                        <a href="#"> <span>Chi tiết sản phẩm</span> </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2"></div>
        </div>
        <?php 
        $sp_id = $_GET['sp_id'];
         $sql_ct = <<<EOT
            SELECT sp.sp_id,sp.sp_ten,sp.sp_mausac,sp.sp_kichthuoc,sp.sp_giabandau,sp.sp_mota,
            sp.sp_giaban,sp.sp_slkho, lsp.lsp_ten, th.th_ten
            FROM sanpham sp 
            JOIN loaisanpham lsp ON lsp.lsp_id = sp.lsp_id
            JOIN thuonghieu th ON th.th_id = sp.th_id
            WHERE sp_id = $sp_id;
            
EOT;
        
       
        $result_ct = mysqli_query($conn, $sql_ct);
       
        while ($row_ct = mysqli_fetch_array($result_ct, MYSQLI_ASSOC)) {
            $sanpham_ct = array(
                'sp_id' => $row_ct['sp_id'],
                'sp_ten' => $row_ct['sp_ten'],
                'sp_mausac' => $row_ct['sp_mausac'],
                'sp_kichthuoc' => $row_ct['sp_kichthuoc'],
                'sp_slkho' => $row_ct['sp_slkho'],
                'sp_mota' => $row_ct['sp_mota'],
                'lsp_ten' => $row_ct['lsp_ten'],
                'th_ten' => $row_ct['th_ten'],
                'sp_giaban' => number_format($row_ct['sp_giaban'], 0, ".", ",") . ' vnđ',
            );
        }
        ?>
        <div class="row ">
            <div class="col-md-2"></div>
            <div class="col-md-8 ">
                <div class="row toantrang_sp">
                    <?php
                         
                        $sql_hspct="SELECT MIN(hsp_id), hsp_ten FROM hinhsanpham hsp WHERE sp_id =".$sanpham_ct['sp_id'];
                        $result_hspct = mysqli_query($conn, $sql_hspct);
                                 
                        while ($row_hspct = mysqli_fetch_array($result_hspct, MYSQLI_ASSOC)) {
                            $hinhsanpham_ct = array(
                             //  'hsp_id' => $row1['hsp_id'],
                                'hsp_ten' => $row_hspct['hsp_ten'],                                        
                            );
                          }
                    ?>
                    <div class="col-md-6 img_trang">
                        <img src="/Du_an_nien_luan/assets/img/upload_img/<?= $hinhsanpham_ct['hsp_ten'] ?>" alt="Lỗi tải ảnh !">
                    </div>
                    <div class="col-md-6 content_trang">
                        <div class="title_sanpham">
                            <h4><?=$sanpham_ct['sp_ten']?></h4>
                            <p>Thương hiệu: <span><?=$sanpham_ct['th_ten']?></span></p>
                        </div>
                        <div class="thongtin_sanpham">
                            <h5><?=$sanpham_ct['sp_giaban']?> </h5>
                            <p>Loại sản phẩm: <span class="tinhtrang"><?=$sanpham_ct['lsp_ten']?></span></p>
                            <p>Số lượng còn lại: <span class="tinhtrang"><?=$sanpham_ct['sp_slkho']?></span></p>
                            <h6 style="font-weight: bold;">Mô tả: </h6> <span><?=$sanpham_ct['sp_mota']?></span>

                            <ul style="list-style-type: none;" class="sl_dathang">
                                <li>
                                    Số lượng:
                                    <div class="buttons_added">
                                        <input class="minus is-form" type="button" value="-"
                                            onclick="buttonClick_tru();">
                                        <input aria-label="quantity" id="inc" class="input-qty" max="100" min="1"
                                            name="" type="number" value="1">
                                        <input class="plus is-form" type="button" value="+"
                                            onclick="buttonClick_cong();">
                                    </div>
                                </li>
                                <li class="dathang">
                                    <button type="button" class="btn btn-dathang">Đặt hàng ngay</button>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="row danhmuc_muasp">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 title_danhmuc">
                                <span>HÀNG MỚI VỀ</span> <br>
                                <img src="/Du_an_nien_luan/assets/img/icon&logo/icon_product.PNG" alt="">
                            </div>
                        </div>
                      
                        <!-- -------------------------------------------------------------- -->
                        <?php
                        //  include_once(__DIR__ . '/dbconnect.php');
                         $sql_re="SELECT * FROM sanpham  ORDER BY sp_giaban ASC  LIMIT 4";
                         $result_re = mysqli_query($conn, $sql_re);
                         $data_re = [];
                         while ($row_re = mysqli_fetch_array($result_re, MYSQLI_ASSOC)) {
                             $data_re[] = array(
                                 'sp_id' => $row_re['sp_id'],
                                 'sp_ten' => $row_re['sp_ten'],  
                                 'sp_giaban' => number_format($row_re['sp_giaban'], 0, ".", ",") . ' vnđ',
                             );
                         }
                        ?>

                        <!-- -------------hien thi san pham----------------------- -->
                        <div class="row row-cols-1 row-cols-md-4 row_sanpham">
                            <?php foreach($data_re as $sanpham_re):?>
                            <?php
                            
                                 $sql_hspre="SELECT MAX(hsp_id), hsp_ten FROM hinhsanpham hsp WHERE sp_id =".$sanpham_re['sp_id'];
                                 $result_hspre = mysqli_query($conn, $sql_hspre);
                                 
                                 while ($row_hspre = mysqli_fetch_array($result_hspre, MYSQLI_ASSOC)) {
                                     $hinhsanpham_re = array(
                                         'hsp_ten' => $row_hspre['hsp_ten'],                                        
                                     );
                                 }
                            ?>
                            <div class="card h-80 shadow-sm card-fa card-body ele-card">
                                <div class="div_img_card">
                                    <img src="/Du_an_nien_luan/assets/img/upload_img/<?= $hinhsanpham_re['hsp_ten'] ?>"
                                        class="card-img-top news-item-img image-card"
                                        style=" height: 300px; width: 240px; padding: 10px 0px 0px 10px;">
                                    <div class="overlay">
                                        <div class="icon_thanhtoan">
                                            <a href="">
                                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="icon_xemthem">
                                            <a
                                                href="/Du_an_nien_luan/backend/pages/chitiet_sanpham.php?sp_id=<?=$sanpham_re['sp_id']?>">
                                                <i class="fa fa-search-plus" aria-hidden="true"></i> </a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bodyCard">
                                    <h5 class="card-title text-center"><?=$sanpham_re['sp_ten']?></h5>
                                    <p class="card-text"><?=$sanpham_re['sp_giaban']?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- ------------------------- -->

                        </div>
                        <!-- --------------------------------------- -->

                    </div>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>

        <!-- start footer  -->
        <?php include_once(__DIR__.'/../partials/footer.php'); ?>
        <!-- end footer  -->
    </div>
    <script>
    var i = 0;

    function buttonClick_cong() {
        i++;
        if (i < 0) {
            document.getElementById('inc').value = 0;
        } else {
            document.getElementById('inc').value = i;
        }
    }

    function buttonClick_tru() {
        i--;
        document.getElementById('inc').value = i;
    }
    </script>
    <!-- end slider home -->
    <?php include_once(__DIR__.'/../scripts.php'); ?>

    <!-- form đăng nhập -->
    <?php include_once(__DIR__.'/../partials/dangnhap_popup.php'); ?>
    <!-- end form đăng nhập -->
    <!-- ràng buộc phía client cho form đăng nhập  -->

    <!-- end ràng buột đang nhập  -->



</body>

</html>
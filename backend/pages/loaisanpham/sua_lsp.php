<?php
if (session_id() === '') {
  session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoonStore - Cập nhật Loại sản phẩm</title>
    <?php include_once(__DIR__.'/../../styles.php'); ?>
    
   <style>

.body_formdangky {
    margin-top: 10px;
    text-align: center;
}

.body_formdangky label {
    font-weight: 600;
    
}

.title_formdangky {
    text-align: center;
    /* padding-top: 10px; */
}

.title_formdangky h4 {
    font-weight: 600;
    color: #8A2908;
}

.form-gioitinh span {
    padding-right: 20px;
    padding-left: 5px;
}

.form-gioitinh {
    margin-left: 20px;
}

.submit_formdangky {
    text-align: center;
    margin-top: 10px;
}

.submit_formdangky button {
    border: 2px solid #FF8000;
    border-radius: 20px;
    background-color: #FF8000;
    width: 300px;
    color: white;
    font-weight: bolder;
    transition: all 0.2s ease-in-out;
}

.submit_formdangky button:hover {
    background-color: white;
    color: #FF4000;
}
   </style>
</head>

<body class="d-flex flex-column h-100">
    <div class="container-fluid">
        <!-- start navbar-header -->
        <?php include_once(__DIR__.'/../../partials/header_admin.php'); ?>
        <!-- end navbar-header -->
        <div class="row duongdan_row">
            <div class="col-md-2"></div>
            <div class="col-md-8 duongdan">
                <ul style="list-style-type: none;">
                    <li class="duongdan_truoc">
                        <a href="../HtmlFile/index.html"><span>Trang chủ</span> </a>
                    </li>

                    <li class="duongdan_hientai">
                        <a href="../HtmlFile/dang_ky.html"> <span>Cập nhật loại sản phẩm</span> </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2"></div>

        </div>
        <div class="row ">
            <div class="col-md-4"></div>
            <div class="col-md-4 ">
                <main role="main" class=" ml-sm-auto px-4 mb-2  content_lsp">
                    <!-- Block content -->
                    <?php
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
                    include_once(__DIR__ . '/../../../dbconnect.php');
                    $lsp_id = $_GET['lsp_id'];
                   
                    $sql = "SELECT * FROM loaisanpham WHERE lsp_id =".$lsp_id;
    
                    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
                    $result = mysqli_query($conn, $sql);
                    $data = [];
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $data[] = array(
                            'lsp_ten' => $row['lsp_ten'],
                            'lsp_id' => $row['lsp_id']
                        );
                    }
                    ?>
                    <!-- start form them loai san pham -->
                    <form name="Form_sualsp" id="Form_sualsp"
                        action="/Du_an_nien_luan/backend/pages/loaisanpham/xuly_sualsp.php" method="POST">
                        <div class="row body_formdangky">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php foreach($data as $loaisanpham): ?>
                                    <label for="txtHoTen">Tên loại sản phẩm cập nhập</label>
                                    <input type="text" class="form-control" name="txttenlsp" id="txttenlsp"
                                        aria-describedby="nameHelp" value="<?= $loaisanpham['lsp_ten']?>">
                                        <input type="hidden" name="lspid" id="lspid" value="<?= $loaisanpham['lsp_id'] ?>">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row body_formdangky">
                            <div class="col-md-12">
                                <div class="form-group">
                                <?php
                                    if(isset( $_SESSION["thongbaolsp"])){
                                        echo  $_SESSION["thongbaolsp"];
                                        session_unset();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row submit_formdangky">
                            <div class="col-md-12">
                                <button type="submit" name="btn_sualsp" id="btn_sualsp" class="btn">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                    <!-- end form them lai san pham  -->

                </main>
            </div>
            <div class="col-md-4"></div>
        </div>
        <?php include_once(__DIR__ . '/../../partials/footer.php'); ?>
    </div>


    <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
    <?php include_once(__DIR__ . '/../../scripts.php'); ?>

    <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->


    <!-- SweetAlert -->
    <script src="/Du_an_nien_luan/backend/pages/loaisanpham/them_sua_lsp.js"></script>

</body>

</html>




<!-- <div class="modal fade" id="popup_sualsp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="Form_sualsp" id="Form_sualsp"
                action="/Du_an_nien_luan/backend/pages/loaisanpham/xuly_sualsp.php" method="POST">

                <div class="modal-header">
                    <h5 class="modal-title title-dangnhap" id="exampleModalLabel">chỉnh sửa loại sản phẩm
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên loại sản phẩm cập nhật:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="txttenlsp_sua" name="txttenlsp_sua"
                                placeholder="Tên loại sản phẩm">
                            <input type="text" class="form-control" id="txttenlsp_sua" name="txttenlsp_sua"
                                placeholder="
                                
                                
                                

                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary" name="btn_sualsp" id="btn_sualsp">Cập
                        nhật</button>
                </div>

            </form>
        </div>
    </div>
</div> -->
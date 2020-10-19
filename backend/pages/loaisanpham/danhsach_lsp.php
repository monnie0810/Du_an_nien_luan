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
    <title>MoonStore - Danh sách sản phẩm</title>


    <?php include_once(__DIR__.'/../../styles.php'); ?>

    <!-- DataTable CSS -->
    <link href="/Du_an_nien_luan/assets/vendor/DataTables/datatables.min.css" type="text/css" rel="stylesheet" />
    <link href="/Du_an_nien_luan/assets/assets/vendor/DataTables/Buttons-1.6.3/css/buttons.bootstrap4.min.css"
        type="text/css" rel="stylesheet" />
    <style>
    .content_lsp {
        width: 100%;
        margin: auto;
        text-align: center;
    }

    .content_pages {
        margin: auto;
    }

    .tables_div {
        margin: auto;
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
                        <a href="../HtmlFile/dang_ky.html"> <span>Danh sách loại sản phẩm</span> </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2"></div>

        </div>
        <div class="row ">
            <div class="col-md-2"></div>
            <div class="col-md-8 ">
                <main role="main" class=" ml-sm-auto px-4 mb-2  content_lsp">


                    <!-- Block content -->
                    <?php
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
                    include_once(__DIR__ . '/../../../dbconnect.php');
                    $i=1;
                    $sql = "SELECT * FROM loaisanpham";
    
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
                    <div
                        class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
                        <h1 class="h2">Danh sách loại sản phẩm</h1>
                    </div>
                    <!-- Nút thêm mới, bấm vào sẽ hiển thị form nhập thông tin Thêm mới -->
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#popup_themlsp">
                        Thêm loại sản phẩm
                    </a>
                    <div class="row content_pages">
                        <div class="tables_div">
                            <table id="tblDanhSach"
                                class="table table-hover table-sm table-responsive mt-5 trangchu_pages">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Số thứ tự</th>
                                        <th>Tên loại sản phẩm</th>
                                        <th>Tác vụ</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($data as $dondathang) : ?>
                                    <tr>
                                        <td><?php echo $i; $i++; ?></td>
                                        <td><?= $dondathang['lsp_ten'] ?></td>
                                        <td>
                                            <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính -->
                                            <a href="sua_lsp.php?lsp_id=<?= $dondathang['lsp_id'] ?>"
                                                class="btn btn-warning" data-toggle="modal"
                                                data-target="#popup_themlsp">
                                                Sửa
                                            </a>
                                            <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `dh_ma` -->
                                            <button type="button" class="btn btn-danger btnDelete"
                                                data-lsp_id="<?= $dondathang['lsp_id'] ?>">
                                                Xóa
                                            </button>

    
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End block content -->
                </main>
            </div>
            <div class="col-md-2"></div>
            <?php include_once(__DIR__ . '/../../partials/footer.php'); ?>
        </div>
    </div>

    <!-- footer -->
    <div class="modal fade" id="popup_themlsp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- start form them loai san pham -->
                <form name="Form_themlsp" id="Form_themlsp"
                    action="/Du_an_nien_luan/backend/pages/loaisanpham/xuly_themlsp.php" method="POST">

                    <div class="modal-header">
                        <h5 class="modal-title title-dangnhap" id="exampleModalLabel">Thêm loại sản phẩm
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tên loại sản phẩm:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="txttenlsp" name="txttenlsp"
                                    placeholder="Tên loại sản phẩm">
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary" name="btn_themlsp"
                            id="btn_themlsp">Thêm</button>
                    </div>

                </form>
                <!-- end form them loai san pham  -->
            </div>
        </div>
    </div>

    <!-- end footer -->

    <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
    <?php include_once(__DIR__ . '/../../scripts.php'); ?>

    <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
    <!-- DataTable JS -->
    <script src="/Du_an_nien_luan/assets/vendor/DataTables/datatables.min.js"></script>
    <script src="/Du_an_nien_luan/assets/vendor/DataTables/Buttons-1.6.3/js/buttons.bootstrap4.min.js"></script>
    <script src="/Du_an_nien_luan/assets/vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="/Du_an_nien_luan/assets/vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>

    <!-- SweetAlert -->
    <script src="/Du_an_nien_luan/assets/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#tblDanhSach').DataTable({
            dom: 'Blfrtip',
            buttons: [

            ]
        });

        // Cảnh báo khi xóa
        $('.btnDelete').click(function() {

            swal({
                    title: "Bạn có chắc chắn muốn xóa?",
                    text: "Sau khi xóa thì không thể phục hồi !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var lsp_id = $(this).data('lsp_id');
                        var url = "xoa_lsp.php?lsp_id=" + lsp_id;
                        location.href = url;
                    }
                });

        });
    });
    </script>
    <script src="/Du_an_nien_luan/backend/pages/loaisanpham/them_lsp.js"></script>

</body>

</html>
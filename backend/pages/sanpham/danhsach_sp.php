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
    <title>MoonStore - Sản phẩm</title>


    <?php include_once(__DIR__.'/../../styles.php'); ?>

    <!-- DataTable CSS -->
    <link href="/Du_an_nien_luan/assets/vendor/DataTables/datatables.min.css" type="text/css" rel="stylesheet" />
    <link href="/Du_an_nien_luan/assets/vendor/DataTables/Buttons-1.6.3/css/buttons.bootstrap4.min.css" type="text/css" rel="stylesheet" />
    <style>
    .content_lsp {
        width: 100%;
        margin: auto;
        text-align: center;
        padding-left: 0px;
        padding-right: 0px;

    }

    .content_pages {
        margin: auto;
        padding-left: 0px;
        padding-right: 0px;
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
                        <a href="/Du_an_nien_luan/backend/pages/index_admin.php"><span>Trang chủ</span> </a>
                    </li>

                    <li class="duongdan_hientai">
                        <a href="../HtmlFile/dang_ky.html"> <span>Danh sách sản phẩm</span> </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2"></div>

        </div>
        <div class="row ">

            <div class="col-md-12 ">
                <main role="main" class=" ml-sm-auto px-4 mb-2  content_lsp">


                    <!-- Block content -->
                    <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                include_once(__DIR__ . '/../../../dbconnect.php');
                $i=1;
                $sql = <<<EOT
    SELECT sp.sp_id,sp.sp_ten,sp.sp_mausac,sp.sp_kichthuoc,sp.sp_giabandau,sp.sp_giaban,sp.sp_slkho, lsp.lsp_ten, th.th_ten
    FROM sanpham sp 
    JOIN loaisanpham lsp ON lsp.lsp_id = sp.lsp_id
    JOIN thuonghieu th ON th.th_id = sp.th_id
    GROUP BY sp.sp_id;
EOT;

                // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
                $result = mysqli_query($conn, $sql);
                $data = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $data[] = array(
                        'sp_id' => $row['sp_id'],
                        'sp_ten' => $row['sp_ten'],
                        'sp_mausac' => $row['sp_mausac'],
                        'sp_kichthuoc' => $row['sp_kichthuoc'],
                        'sp_slkho' => $row['sp_slkho'],
                        'lsp_ten' => $row['lsp_ten'],
                        'th_ten' => $row['th_ten'],
                        'sp_giabandau' => number_format($row['sp_giabandau'], 0, ".", ",") . ' vnđ',
                        'sp_giaban' => number_format($row['sp_giaban'], 0, ".", ",") . ' vnđ',
                    );
                }
                ?>
                    <div
                        class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
                        <h1 class="h2">Danh sách sản phẩm</h1>
                    </div>
                    <!-- Nút thêm mới, bấm vào sẽ hiển thị form nhập thông tin Thêm mới -->
                    <a href="/Du_an_nien_luan/backend/pages/sanpham/them_sp.php" class="btn btn-primary">
                        Thêm sản phẩm
                    </a>

                    <div class="row content_pages">
                        <div class="tables_div">
                            <table id="tblDanhSach_sp" class="table table-hover table-sm table-responsive mt-5 trangchu_pages">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Màu sắc</th>
                                        <th>Kích thước</th>
                                        <th>Giá nhập</th>
                                        <th>Giá bán</th>
                                        <th>Số lượng kho</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Thương hiệu</th>
                                        <th colspan="3">Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $dondathang) : ?>
                                    <tr>
                                        <td><?php echo $i; $i++ ?></td>
                                        <td><?= $dondathang['sp_ten'] ?></td>
                                        <td><?= $dondathang['sp_mausac'] ?></td>
                                        <td><?= $dondathang['sp_kichthuoc'] ?></td>
                                        <td><?= $dondathang['sp_giabandau'] ?></td>
                                        <td><?= $dondathang['sp_giaban'] ?></td>
                                        <td><?= $dondathang['sp_slkho'] ?></td>
                                        <td><?= $dondathang['lsp_ten'] ?></td>
                                        <td><?= $dondathang['th_ten'] ?></td>

                                        <td>
                                            <!-- ------------------------hinh san pham------------------- -->




                                            <!-- ------------------------hinh san pham------------------- -->
                                            <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính -->
                                            <a href="sua_sp.php?sp_id=<?= $dondathang['sp_id'] ?>"
                                                class="btn btn-warning">
                                                Sửa
                                            </a>
                                            <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `dh_ma` -->
                                            <button type="button" class="btn btn-danger btnDelete"
                                                data-sp_id="<?= $dondathang['sp_id'] ?>">
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

        </div>
        <?php include_once(__DIR__ . '/../../partials/footer.php'); ?>
    </div>



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
        $('#tblDanhSach_sp').DataTable({
            dom: 'Blfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
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
    <script src="/Du_an_nien_luan/backend/pages/loaisanpham/them_sua_lsp.js"></script>

</body>

</html>
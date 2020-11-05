<?php
// Hiển thị tất cả lỗi trong PHP
// Chỉ nên hiển thị lỗi khi đang trong môi trường Phát triển (Development)
// Không nên hiển thị lỗi trên môi trường Triển khai (Production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load các thư viện (packages) do Composer quản lý vào chương trình
require_once __DIR__ . '/../../vendor/autoload.php';

if (session_id() === '') {
  
    session_start();
}
if (!isset($_SESSION['kh_tendangnhap_logged']) || empty($_SESSION['kh_tendangnhap_logged'])) {
    echo 'Vui lòng Đăng nhập trước khi Thanh toán! <a href="/php/myhand/backend/auth/login.php">Click vào đây để đến trang Đăng nhập</a>';
    die;
} else {
    // Nếu giỏ hàng trong session rỗng, return
    if (!isset($_SESSION['giohangdata']) || empty($_SESSION['giohangdata'])) {
        echo 'Giỏ hàng rỗng. Vui lòng chọn Sản phẩm trước khi Thanh toán!';
        die;
    }

    include_once(__DIR__ . '/../../dbconnect.php');


    $kh_tendangnhap = $_SESSION['kh_tendangnhap_logged'];
    // var_dump($kh_tendangnhap);die;
    $sqlSelectKhachHang = <<<EOT
        SELECT *
        FROM `khachhang` kh
        WHERE kh.kh_tendangnhap = '$kh_tendangnhap'
EOT;
    // var_dump($sqlSelectKhachHang);die;

    // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record 
    $resultSelectKhachHang = mysqli_query($conn, $sqlSelectKhachHang);

    // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
    $khachhangRow;
    while ($row = mysqli_fetch_array($resultSelectKhachHang, MYSQLI_ASSOC)) {
        $khachhangRow = array(
            'kh_tendangnhap' => $row['kh_tendangnhap'],
            'kh_ten' => $row['kh_ten'],
            'kh_email' => $row['kh_email'],
            'kh_diachi' => $row['kh_diachi'],
        );
    }
    /* --- End Truy vấn dữ liệu Khách hàng --- */

    // Thông tin đơn hàng
    $dh_ngaylap = date('Y-m-d'); // Lấy ngày hiện tại theo định dạng yyyy-mm-dd
    $dh_ngaygiao = date('Y-m-d');
    $dh_noigiao = '';
    $dh_trangthaithanhtoan = 0; // Mặc định là 0 chưa thanh toán
    $httt_ma = 1; // Mặc định là 1

   
    $sqlInsertDonHang = <<<EOT
    INSERT INTO `dondathang` (`dh_ngaylap`, `dh_ngaygiao`, `dh_noigiao`, `dh_trangthaithanhtoan`, `httt_ma`, `kh_tendangnhap`) 
        VALUES ('$dh_ngaylap', '$dh_ngaygiao', N'$dh_noigiao', '$dh_trangthaithanhtoan', '$httt_ma', '$kh_tendangnhap');
EOT;
    // print_r($sqlInsertDonHang); die;

    // Thực thi INSERT Đơn hàng
    mysqli_query($conn, $sqlInsertDonHang);


    $dh_ma = $conn->insert_id;
    
    $giohangdata = $_SESSION['giohangdata'];

    
    foreach ($giohangdata as $item) {
      
        $sp_ma = $item['sp_ma'];
        $sp_dh_soluong = $item['soluong'];
        $sp_dh_dongia = $item['gia'];

        // 4.2. Câu lệnh INSERT
        $sqlInsertSanPhamDonDatHang = <<<EOT
        INSERT INTO `sanpham_dondathang` (`sp_ma`, `dh_ma`, `sp_dh_soluong`, `sp_dh_dongia`) 
            VALUES ($sp_ma, $dh_ma, $sp_dh_soluong, $sp_dh_dongia);
EOT;

        // 4.3. Thực thi INSERT
        mysqli_query($conn, $sqlInsertSanPhamDonDatHang);
    }


        $templateDonHang = '<ul>';
        $templateDonHang .= '<li>Họ tên khách hàng: ' . $khachhangRow['kh_ten'] . '</li>';
        $templateDonHang .= '<li>Địa chỉ khách hàng: ' . $khachhangRow['kh_diachi'] . '</li>';
        $templateDonHang .= '<ul>';

        $stt = 1;
        $templateChiTietDonHang = '<table border="1" width="100%">';
        $templateChiTietDonHang .= '<tr>';
        $templateChiTietDonHang .= '<td>STT</td>';
        $templateChiTietDonHang .= '<td>Sản phẩm</td>';
        $templateChiTietDonHang .= '<td>Số lượng</td>';
        $templateChiTietDonHang .= '<td>Giá</td>';
        $templateChiTietDonHang .= '<td>Thành tiền</td>';
        $templateChiTietDonHang .= '</tr>';
        foreach ($giohangdata as $item) {
            $templateChiTietDonHang .= '<tr>';
            $templateChiTietDonHang .= '<td>' . $stt . '</td>';
            $templateChiTietDonHang .= '<td>' . $item['sp_ten'] . '</td>';
            $templateChiTietDonHang .= '<td>' . $item['soluong'] . '</td>';
            $templateChiTietDonHang .= '<td>' . $item['gia'] . '</td>';
            $templateChiTietDonHang .= '<td>' . ($item['soluong'] * $item['gia']) . '</td>';
            $templateChiTietDonHang .= '</tr>';
            $stt++;
        }
        $templateChiTietDonHang .= '</table>';

        $body = <<<EOT
            <table border="1" width="100%">
                <tr>
                    <td colspan="2">
                        <img src="http://learning.nentang.vn/php/myhand/assets/shared/img/logo-nentang.jpg" style="width: 100px; height: 100px; border: 1px solid red;" />
                    </td>
                </tr>
                <tr>
                    <td>Có Đơn hàng vừa thanh toán</td>
                    <td>
                        <h2>Thông tin đơn hàng</h2>
                        $templateDonHang

                        <h2>Chi tiết đơn hàng</h2>
                        $templateChiTietDonHang
                    </td>
                </td>
            </table>
EOT;
    
    // 5. Thực thi hoàn tất, điều hướng về trang Danh sách
    // Hủy dữ liệu giỏ hàng trong session
    unset($_SESSION['giohangdata']);
    echo 'Đặt hàng thành công. <a href="/php/myhand/frontend/">Bấm vào đây để quay về trang chủ</a>';
}

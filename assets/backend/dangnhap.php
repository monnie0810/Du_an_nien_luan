
<?php
if (session_id() === '') {
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
include_once(__DIR__.'/../../backend/scripts.php'); 
include_once(__DIR__.'/../../dbconnect.php');
if(isset($_POST['btn_dangnhap'])){
    $sdt = $_POST['txtsodienthoai'];
    $matkhau = sha1($_POST['txtmatkhau']);
    if($sdt != "" && $matkhau != ""){
        $sql = "SELECT * FROM thanhvien WHERE  tv_sdt = '$sdt' AND tv_matkhau = '$matkhau' ";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1){
            $_SESSION["user"]= $sdt; 
        } else {
            $_SESSION["thongbao"]= "Bạn chưa đăng ký tài khoản !"; 
        }
    } else {
        $_SESSION["thongbao"]= "vui lòng nhập thông tin đầy đủ !"; 
    }
    header("location: /Du_an_nien_luan/index.php"); 
}
mysqli_close($conn);

?>
 
<?php
include_once(__DIR__.'/../../../dbconnect.php');

$sp_id = $_GET['sp_id'];

// -----------------xóa hình sản phẩm ------------------------------
$sql="UPDATE `sanpham` SET sp_trangthai=1 WHERE sp_id =".$sp_id;

mysqli_query($conn, $sql);

mysqli_close($conn);
    
header('location:danhsach_sp.php');
?>
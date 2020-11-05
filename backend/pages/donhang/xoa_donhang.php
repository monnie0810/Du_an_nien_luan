<?php
include_once(__DIR__.'/../../../dbconnect.php');

$hd_id = $_GET['hd_id'];


$sql_ct= "DELETE FROM `hoadon_chitiet` WHERE hd_id=".$hd_id;
mysqli_query($conn, $sql_ct);
$sql= "DELETE FROM `hoadon` WHERE hd_id=".$hd_id;

mysqli_query($conn, $sql);
    
mysqli_close($conn);
header('location: /Du_an_nien_luan/backend/pages/donhang/ds_donhang.php');

?>
<?php
include_once(__DIR__.'/../../../dbconnect.php');

$tv_id = $_GET['tv_id'];

$sql= "DELETE FROM `thanhvien` WHERE tv_id=" . $tv_id;

$result = mysqli_query($conn, $sql);


mysqli_close($conn);
    
header('location:ds_thanhvien.php');
?>
<?php
include_once(__DIR__.'/../../../dbconnect.php');

$sp_id = $_GET['sp_id'];

$sql= "DELETE FROM `sanpham` WHERE sp_id=" . $sp_id;

$result = mysqli_query($conn, $sql);


mysqli_close($conn);
    
header('location:danhsach_sp.php');
?>
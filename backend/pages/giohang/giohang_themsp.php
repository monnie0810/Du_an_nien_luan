<?php

if (session_id() === '') {
    session_start();
}
include_once(__DIR__ . '/../../dbconnect.php');
include_once(__DIR__.'/../styles.php');
include_once(__DIR__.'/../scripts.php');
if(isset($_POST['btn_dathang'])){



$sp_ma = $_POST['sp_id'];
$sp_ten = $_POST['sp_ten'];
$soluong = $_POST['sl_mua'];
$gia = $_POST['sp_giaban'];
$hinhdaidien = $_POST['hinhdaidien'];

if (isset($_SESSION['giohangdata'])) {
    $data = $_SESSION['giohangdata'];
    $data[$sp_ma] = array(
        'sp_ma' => $sp_ma,
        'sp_ten' => $sp_ten,
        'soluong' => $soluong,
        'gia' => $gia,
        'thanhtien' => ($soluong * $gia),
        'hinhdaidien' => $hinhdaidien
    );

    $_SESSION['giohangdata'] = $data;
} else { 
    $data[$sp_ma] = array(
        'sp_ma' => $sp_ma,
        'sp_ten' => $sp_ten,
        'soluong' => $soluong,
        'gia' => $gia,
        'thanhtien' => ($soluong * $gia),
        'hinhdaidien' => $hinhdaidien
    );

    
    $_SESSION['giohangdata'] = $data;
}


echo json_encode($_SESSION['giohangdata']);
}
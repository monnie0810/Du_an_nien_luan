<?php
session_start();
if(isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    header("location: /Du_an_nien_luan/index.php"); 
    die;
} else {
    header("location: /Du_an_nien_luan/index.php"); 
}
?>

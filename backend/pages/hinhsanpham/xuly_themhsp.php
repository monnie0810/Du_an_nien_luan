<?php
if (session_id() === '') {
  session_start();
}
         include_once(__DIR__.'/../../../dbconnect.php'); 
       
        if (isset($_POST['btnthem_hsp'])) {

            $sp_id = $_POST['txt_spid'];
          

            if (isset($_FILES['hsp_tentaptin']['name'])) {
              // echo $sp_id; 
              $upload_dir = __DIR__ . "/../../../assets/img/upload_img/";             
              if ($_FILES['hsp_tentaptin']['error'] > 0) {
                $_SESSION['thongbao_hsp']='Vui lòng thêm hình ảnh !';
                header("location: /Du_an_nien_luan/backend/pages/hinhsanpham/them_hsp.php?sp_id=".$sp_id); 

              } else {
          
                $hsp_tentaptin = $_FILES['hsp_tentaptin']['name'];
                $tentaptin = date('YmdHis') . '_' . $hsp_tentaptin;
                move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'], $upload_dir . $tentaptin);
              
                // var_dump($_FILES['hsp_tentaptin']['tmp_name']);
                // var_dump($upload_dir . $subdir . $tentaptin);
                $sql_hsp="SELECT hsp_id FROM hinhsanpham WHERE sp_id=".$sp_id;
                $sql_hinhanh =  mysqli_query($conn, $sql_hsp);
                if(mysqli_num_rows($sql_hinhanh) == 0){
                  $sql = "INSERT INTO `hinhsanpham` (hsp_ten, sp_id,hsp_title) VALUES ('$tentaptin', $sp_id,1);";
                } else {
                  $sql = "INSERT INTO `hinhsanpham` (hsp_ten, sp_id,hsp_title) VALUES ('$tentaptin', $sp_id,0);";
                }
               
              mysqli_query($conn, $sql);
               
            }
              // Đóng kết nối
              mysqli_close($conn);

              // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
              header("location: /Du_an_nien_luan/backend/pages/hinhsanpham/danhsach_hsp.php?sp_id=".$sp_id);
              
        }
          else {
            echo "Không tải được file lên !!";
          }
        }
?>
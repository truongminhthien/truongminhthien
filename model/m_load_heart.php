<?php
include_once "m_user_product.php";
// kiểm tra xem có nhận dữ liệu từ ajax
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // lấy dữ liệu ajax xuống 
    $idCH = $_POST['idCH'];
    $idTK = $_POST['idTK'];
    // Kiểm tra xem đã đăng nhập hay chưa
    if ($idTK > 0) { // Đã đăng nhập 
        // Kiểm tra xem tài khoản có mã yêu thích chưa
        if (search_heart($idTK, $idCH)) { // Nếu đã có mã yêu thích      
            echo 'YÊU THÍCH';
            echo  delete_heart(search_heart($idTK, $idCH)['MaYT']);
        } else { // Nếu chưa có mã yêu thích
            // Thêm vào mã yêu thích đó căn hộ được chọn
            echo 'ĐÃ YÊU THÍCH';
            insert_heartYT($idTK, $idCH);
        }
    } else { // Chưa đăng nhập đưa đến trang đăng nhập 
        echo 'LOGIN';
    }
}

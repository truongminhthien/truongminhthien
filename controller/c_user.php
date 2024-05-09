<?php
// Gửi/nhận dữ liệu thông qua model
// Hiển thị dữ liệu thông qua view
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'login':
            // Lấy dữ liệu
            if (isset($_POST['sodienthoai']) && isset($_POST['matkhau'])) {
                include_once 'model/m_user_login.php';
                $SoDienThoai = $_POST['sodienthoai'];
                $MatKhau = $_POST['matkhau'];

                // Băm mật khẩu để so sánh với mật khẩu trong cơ sở dữ liệu
                $key = 'admin';
                $hashedPassword = hash_hmac('sha3-256', $MatKhau, $key);

                $kq = Login($SoDienThoai, $hashedPassword);
                if ($kq) {
                    // Đăng nhập thành công
                    $_SESSION['user'] = $kq;
                    header('Location: index.php?mod=page&act=home');
                    exit(); // Kết thúc script sau khi chuyển hướng
                } else {
                    $_SESSION['loi'] = "Số điện thoại hoặc mật khẩu không đúng!";
                }
            }
            //Tên trang hiển thị dữ liệu
            $view_name = 'user_login';
            break;

        case 'register':
            // Lấy dữ liệu
            include_once 'model/m_user_login.php';
            include_once 'model/mailer.php';
            // Thêm đoạn mã kiểm tra lỗi
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            if (isset($_POST['submit'])) {
                $HoTen = $_POST['HoTen'];
                $SoDienThoai = $_POST['SoDienThoai'];
                $Email = $_POST['Email'];
                $DiaChi = $_POST['DiaChi'];
                $MatKhau = $_POST['MatKhau'];
                $HinhAnh = 'default.jpg';
                if (isset($_FILES['HinhAnh']) && $_FILES['HinhAnh']['error'] == UPLOAD_ERR_OK) {
                    $HinhAnh = $_FILES['HinhAnh']['name'];
                    $HinhAnh_tmp = $_FILES['HinhAnh']['tmp_name'];
                    $upload_directory = 'uploads/avatar/';
                    if (!is_dir($upload_directory)) {
                        mkdir($upload_directory, 0755, true);
                    }
                    $file_destination = $upload_directory . $HinhAnh;
                    $i = 1;
                    while (file_exists($file_destination)) {
                        $filename = pathinfo($HinhAnh, PATHINFO_FILENAME);
                        $extension = pathinfo($HinhAnh, PATHINFO_EXTENSION);
                        $HinhAnh = $filename . '_' . $i . '.' . $extension;
                        $file_destination = $upload_directory . $HinhAnh;
                        $i++;
                    }
                    move_uploaded_file($HinhAnh_tmp, $file_destination);
                } else {
                    $HinhAnh = 'default.jpg';
                }
                $result = kiemtraemail($Email, $SoDienThoai);
                if ($result) {
                    if (!empty($result['SoDienThoai'])) {
                        $_SESSION['loi'] = "Tài Khoản Với Số Điện Thoại '<strong>" . $result['SoDienThoai'] . "</strong>' Đã Tồn Tại";
                    } elseif (!empty($result['Email'])) {
                        $_SESSION['loi'] = "Tài Khoản Với Email Này '<strong>" . $result['Email'] . "</strong>' Đã Tồn Tại";
                    }
                } else {
                    $Quyen = '0';
                    $kq = Register($HoTen, $SoDienThoai, $Email, $DiaChi, $MatKhau, $HinhAnh, $Quyen);
                    if ($kq) {
                        $kichhoat = guimailkichhoattaikhoan($HoTen, $Email);
                        if ($kichhoat) {
                            $_SESSION['thongbao'] = '<h3>Tài Khoản Của Bạn Được Tạo Thành Công. Vui Lòng Kiểm Tra Email Để Kích Hoạt Tài Khoản.</h3>';
                            header('Location: index.php?mod=page&act=thanhcong');
                        }
                    }
                }

            }
            $view_name = 'user_register';

            break;

        case 'forgotpass':
            //lấy dữ liệu
            include_once 'model/m_user_login.php';
            include_once 'model/mailer.php';
            if (isset($_POST['submit'])) {
                $Email = $_POST['Email'];
                $KiemTra = ForGotPass($Email);
                if ($KiemTra) {
                    $kq = guimailthaydoimatkhau($Email);
                    if ($kq) {
                        $_SESSION['thongbao'] = '<h3>Vui Lòng Truy Cập Email Để Thực Hiện Hướng Dẫn Để Thay Đổi Mật Khẩu.</h3>';
                        header('Location: index.php?mod=page&act=thanhcong');
                    }
                }
            }
            //Tên trang hiển thị dữ liệu
            $view_name = 'user_gotpass';
            break;
        case 'updateusr':
            include_once 'model/m_user_login.php';
            if (isset($_POST['submit'])) {
                if (isset($_FILES['HinhAnh'])) {
                    $HinhAnh = $_FILES['HinhAnh']['name'];
                    $HinhAnh_tmp = $_FILES['HinhAnh']['tmp_name'];
                    $upload_directory = 'uploads/avatar/';
                    if (!is_dir($upload_directory) || !is_writable($upload_directory)) {
                        die('Thư mục lưu trữ không hợp lệ hoặc không có quyền ghi.');
                    }
                    $file_destination = $upload_directory . $HinhAnh;
                    move_uploaded_file($HinhAnh_tmp, $file_destination);
                } else {
                    $file_destination = 'uploadavt/default.jpg';
                }
                if ($_FILES['HinhAnh']['name'] != null) {
                    $file_path = 'uploads/avatar/' . $_SESSION['user']['HinhAnh'];
                    $_SESSION['user']['HinhAnh'] = $HinhAnh;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }

                $_SESSION['user']['SoDienThoai'] = $_POST['SoDienThoai'];
                $_SESSION['user']['TenKhachHang'] = $_POST['Hoten'];
                $_SESSION['user']['Email'] = $_POST['Email'];
                $_SESSION['user']['DiaChiKhachHang'] = $_POST['DiaChi'];
                UpDateUsr($_SESSION['user']['MaTK'], $_FILES['HinhAnh']['name'], $_POST['Hoten'], $_POST['Email'], $_POST['SoDienThoai'], $_POST['MatKhau'], $_POST['DiaChi']);
            }
            $view_name = "user_pofile";
            break;

        case 'setpass':
            include_once 'model/m_user_login.php';
            if (isset($_GET['email'])) {
                $Email = $_GET['email'];
                if (isset($_POST['submit'])) {
                    $MatKhau = $_POST['MatKhau'];
                    $kq = Setpass($MatKhau, $Email);
                    if ($kq) {
                        header("Location: index.php?mod=user&act=login");
                    }

                }
            }

            $view_name = 'user_setpass';
            break;
        case 'kichhoat':
            include_once 'model/m_user_login.php';
            if (isset($_GET['email'])) {
                $Email = $_GET['email'];
                $kq = kichhoattaikhoan($Email);
                if ($kq) {
                    header("Location: index.php?mod=user&act=login");
                }
            }
            break;
        default:
            # code...
            break;
    }
    include_once 'view/v_user_layout.php';
}

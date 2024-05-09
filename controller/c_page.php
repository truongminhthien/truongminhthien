<?php
//thực hiện gửi và nhận dữ liệu từ model
//hiển thị dữ liệu thông qua view
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            include_once 'model/m_apartment.php';
            $laykv = laykvcanho(30);
            //lấy dữ liệu
            include_once 'model/m_user_home.php';
            // gọi hàm lấy dữ liệu 3 căn hộ vừa được thêm
            $news_Apartment = news_Apartment();
            // Kiểm tra đã đăng nhập hay chưa
            if (isset($_SESSION['user'])) {
                $MaTK = $_SESSION['user']['MaTK'];
            } else {
                $MaTK = 0;
            }
            // Gọi hàm trả về các căn hộ được yêu thích nhất
            $toplike_Apartment = topLike_Apartment($MaTK);
            // Gọi hàm trả về các căn hộ được xem nhiều nhất
            $topEye_Apartment = topEye_Apartment($MaTK);
            // Gọi hàm trả về 3 bình luận
            $topComment = topComment();
            //Tên trang hiển thị dữ liệu
            $view_name = 'user_home';
            break;
        case 'heart':
            //lấy dữ liệu
            include_once 'model/m_user_product.php';
            // gọi hàm lấy dữ liệu  các căn hộ đã được yêu thích
            $heart_Apartment = get_heart($_SESSION['user']['MaTK']);
            //Tên trang hiển thị dữ liệu
            $view_name = 'user_heart';
            break;
        case 'remove_heart':
            //lấy dữ liệu
            include_once 'model/m_user_product.php';
            // gọi hàm lấy dữ liệu  các căn hộ đã được yêu thích
            delete_heart($_GET['id']);
            //Tên trang hiển thị dữ liệu
            header('location: index.php?mod=page&act=heart');
            break;
        case 'history_update':
            //lấy dữ liệu
            include_once 'model/m_user_product.php';
            // gọi hàm lấy dữ liệu  các căn hộ đã được yêu thích
            if (isset($_POST['huy'])) {
                updeta_historyHuy($_POST['id']);
            } elseif (isset($_POST['tra'])) {
                updeta_historyTra($_POST['id']);
            }
            header('location: index.php?mod=page&act=history');

            break;
        case 'history':
            //lấy dữ liệu
            include_once 'model/m_user_product.php';
            // gọi hàm lấy dữ liệu  các căn hộ đã được yêu thích
            $history_Apartment = search_history($_SESSION['user']['MaTK']);

            //Tên trang hiển thị dữ liệu
            $view_name = 'user_history';
            break;
        case 'update_dh':
            //lấy dữ liệu
            include_once 'model/m_user_product.php';
            // rentNow($_POST['matk'], $_POST['mach'], $ngayNhan, $ngayTra);
            $_SESSION['thongbaothue'] = 'Đã tạo đơn thuê thành công';
            header('location: index.php?mod=page&act=product&id=' . $_POST['mach']);
            break;
        case 'rentnow':
            //lấy dữ liệu
            include_once "model/m_user_product.php";

            // Lấy id căn hộ được yêu cầu thuê
            $id = $_POST['mach'];
            // Lấy dữ liệu căn hộ có id
            $apartment_rentnow = getApartment_rentnow($id);
            // Ngày nhận
            $ngayNhan = $_POST['datePicker1'];
            // Ngày trả
            $ngayTra = $_POST['datePicker2'];
            // Chuyển đổi định dạng ngày từ 'd/m/Y' sang 'Y-m-d'
            $dateNhan = DateTime::createFromFormat('d/m/Y', $ngayNhan);
            $dateTra = DateTime::createFromFormat('d/m/Y', $ngayTra);
            // Tính số ngày chênh lệch giữa hai ngày
            $soNgay = $dateNhan->diff($dateTra)->days;
            //Tên trang hiển thị dữ liệu
            $view_name = 'user_rentnow';
            break;
        case 'buy':
            //lấy dữ liệu
            include_once 'model/m_user_product.php';
            $ngayNhan = strtotime(str_replace('/', '-', $_POST['ngaynhan']));
            $ngayTra = strtotime(str_replace('/', '-', $_POST['ngaytra']));
            $ngayNhan = date('Y-m-d', $ngayNhan);
            $ngayTra = date('Y-m-d', $ngayTra);
            rentNow($_POST['matk'], $_POST['mach'], $ngayNhan, $ngayTra, $_POST['giach']);
            // rentNow($_POST['matk'], $_POST['mach'], $ngayNhan, $ngayTra);
            $_SESSION['thongbaothue'] = 'Đã tạo đơn thuê thành công';
            header('location: index.php?mod=page&act=product&id=' . $_POST['mach']);
            break;
        case 'blog':
            //lấy dữ liệu
            include_once 'model/m_user_tintuc.php';
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $tin = tin($page);
            $tin_luotthich = tin_luotthich();
            $totalPages = count_tin_pages();
            //Tên trang hiển thị dữ liệu
            $view_name = 'user_tintuc';
            break;
        case 'show_blog':
            //lấy dữ liệu
            include_once 'model/m_user_tintuc.php';

            $idTin = $_GET['MaTT'];
            $show_tin = get_show_tin($idTin);
            update_view_count($idTin);
            $tin_luotxem = tin_luotxem();
            $tin_khac = tin_khac();
            $can_ho = can_ho_lienquan($show_tin['MaKV']);
            $view_name = 'user_show_tin';
            break;
        case 'seach_blog':
            include_once 'model/m_user_tintuc.php';
            $seach = seach_tin($_POST['key_tin']);
            $tin_luotthich = tin_luotthich();
            $view_name = 'user_seach_tin';
            break;
        case 'like_tin':
            include_once 'model/m_user_tintuc.php';
            $idTin = $_GET['MaTT'];
            like_tin($idTin);
            header("location: index.php?mod=page&act=show_blog&MaTT=$idTin");
            break;
        case 'comment':
            include_once 'model/m_user_product.php';
            // gọi hàm lưu
            save_comment($_SESSION['user']['MaTK'], $_GET['id'], $_POST['noidung'], $_POST['star']);
            //sau khi lưu quay lại trang sản phẩm đó
            header('location: index.php?mod=page&act=product&id=' . $_GET['id']);
            break;
        case 'product':
            // Kết nối với file truy vấn csdl
            include_once 'model/m_user_product.php';
            // Kiểm tra xem tài khoản được đăng nhập hay chưa
            if (isset($_SESSION['user'])) {
                $MaTK = $_SESSION['user']['MaTK'];
            } else {
                $MaTK = 0;
            }
            //lấy id căn hộ cần hiển thị chi tiết
            $idProduct = $_GET['id'];
            // thêm lượt xem mới cho căn hộ
            updatEye($idProduct);
            // lấy dữ liệu căn hộ đó
            $product = getProduct($idProduct, $MaTK);
            //Lấy dữ liệu các căn hộ cùng khu vực
            $Apartment = getProduct_location($product['MaKV'], $idProduct, $MaTK);
            // Lấy ra các đơn hàng để ẩn ngày đi
            $hiddenDate = get_rentNowDate($idProduct);
            // nếu người dùng đã đăng nhập và đã thuê căn hộ đó sẽ cho người dùng bìn luận
            if (isset($_SESSION['user'])) {
                $comment = get_historyRent($_SESSION['user']['MaTK'], $idProduct);
            }
            // Lấy ra 10 bình luận gần nhất cho căn hộ
            $allComment = get_comment($idProduct);
            //Tên trang hiển thị dữ liệu
            $view_name = 'user_product';
            break;
        case 'apartment':
            //lấy dữ liệu
            include_once 'model/m_apartment.php';
            if (isset($_SESSION['user'])) {
                $MaTK = $_SESSION['user']['MaTK'];
            } else {
                $MaTK = 0;
            }
            $loaicanho = layloaicanho();
            $laych = laych(6);
            $laykv = laykvcanho(6);
            if (isset($_GET['loai'])) {
                $loai = $_GET['loai'];
            } else {
                $loai = "";
            }
            if (isset($_GET['khuvuc'])) {
                $khuvuc = $_GET['khuvuc'];
            } else {
                $khuvuc = "";
            }
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $laycanho = laycanhotheotrang($MaTK, $khuvuc, $loai, 6, $page);
            if ($loai != "") {
                @$_SESSION['thongbao'] = "Tất Cả Các " . $laycanho['0']['TenLoai'];
            } else if ($khuvuc != "") {
                @$_SESSION['thongbao'] = "Tất Cả Các Căn Hộ Thuộc <strong>" . $laycanho['0']['TenKV'] . " </strong>";
            }
            if (isset($_GET['giathap']) && isset($_GET['giacao'])) {
                $giathap = $_GET['giathap'];
                $giacao = $_GET['giacao'];
                $laycanho = laycanhotheokhoanggia($MaTK, $giathap, $giacao, 6, $page);
                $_SESSION['thongbao'] = "Các Căn Hộ Có Giá Từ <strong>" . number_format($giathap, 0, '.', ',') . "VNĐ</strong> Đến <strong>" . number_format($giacao, 0, '.', ',') . "VNĐ</strong>";
                $giamdthap = $giathap;
                $giamdcao = $giacao;
            } else {
                $giamdthap = 1000000;
                $giamdcao = 5500000;
                $giathap = "";
                $giacao = "";
            }
            $sosp = sosanpham($MaTK, $khuvuc, $loai, $giathap, $giacao);
            if (isset($_GET['ngaynhan']) && isset($_GET['ngaytra']) && isset($_GET['diadiem'])) {
                $ngaynhan = $_GET['ngaynhan'];
                $ngaytra = $_GET['ngaytra'];
                $diadiem = $_GET['diadiem'];
                $laycanho = laycantimkiem($ngaynhan, $ngaytra, $diadiem, 6, $page);
                $sosp = solaycanho($ngaynhan, $ngaytra, $diadiem);
                $_SESSION['thongbao'] = 'Tất Cả Các Căn Hộ Được Tìm Kiếm';
            }
            $sotrang = ceil(intval($sosp) / 6);
            //Tên trang hiển thị dữ liệu
            $view_name = 'page_apartment';
            break;
        case 'about':
            $view_name = 'page_about';
            break;
        case 'contact':
            include_once 'model/m_apartment.php';
            include_once 'model/m_contact.php';
            $laych = laych(6);
            if (isset($_POST['gui'])) {
                $tennguoilienhe = $_POST['ten'];
                $email = $_POST['email'];
                $tieude = $_POST['tieude'];
                $noidung = $_POST['noidung'];
                if (guilienhe($tennguoilienhe, $email, $tieude, $noidung)) {
                    header("Location: ?mod=page&act=thanhcong");
                    exit;
                }
            }
            $view_name = 'page_contact';
            break;
        case 'thanhcong':
            $view_name = '404';
            break;
        case 'locgia':
            include_once 'model/m_apartment.php';
            if (isset($_POST['submit'])) {
                $giathap = $_POST['first_price'];
                $giacao = $_POST['last_price'];
                $xoadau = str_replace(',', '', $giathap);
                $giathap = str_replace('VNĐ', '', $xoadau);
                $xoadau = str_replace(',', '', $giacao);
                $giacao = str_replace('VNĐ', '', $xoadau);
                header("Location: ?mod=page&act=apartment&giathap=" . $giathap . "&giacao=" . $giacao);
            }
            break;
        case 'timkiem':
            include_once 'model/m_apartment.php';

            if (isset($_POST['datePicker'])) {
                $diadiem = $_POST['datePicker3'];
                $ngayNhan = strtotime(str_replace('/', '-', $_POST['datePicker1']));
                $ngayTra = strtotime(str_replace('/', '-', $_POST['datePicker2']));
                $ngayNhan = date('Y-m-d', $ngayNhan);
                $ngayTra = date('Y-m-d', $ngayTra);
                header("Location: ?mod=page&act=apartment&ngaynhan=" . $ngayNhan . "&ngaytra=" . $ngayTra . "&diadiem=" . $diadiem);
            }
            break;
        default:
            header('location: index.php?mod=page&act=home');
            break;
    }
    // Mặc định chọn user-layuot làm nôi chèn dữ liệu vào và hiển thị dữ liệu
    include_once 'view/v_user_layout.php';
}

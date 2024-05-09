<?php
// Gửi/nhận dữ liệu thông qua model
// Hiển thị dữ liệu thông qua view
if (isset($_GET['act']) && isset($_SESSION['user'])) {
    if ($_SESSION['user']['Quyen'] == 1) {
        switch ($_GET['act']) {
            case 'dashboard':
                // Lấy dữ liệu
                include_once 'model/m_apartment.php';
                $tkCanHo = apartment_count();
                include_once 'model/m_user.php';
                $tkNguoiDung = user_count();
                include_once 'model/m_comment.php';
                $dsBL = cmt_getAll();
                $tkKhuVuc = area_count();
                $tkLoai = category_count();
                $tkBinhLuan = comment_count();
                // include_once 'model/m_admin_tin_tuc.php';
                $tkTinTuc = tin_tuc_count();
                $apapopular = apartment_popular();
                $apartment_best = apartment_assess_best();
                $news = tin_tuc_moi();
                $user_gan_day = user_recently();
                // Hiển thị dữ liệu
                $view_name = 'admin_dashboard';
                break;

            case 'user':
                // Lấy dữ liệu
                include_once 'model/m_user.php';
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                $dsTK = user_getAll($page);
                $soTrang = ceil(intval(user_getAllTotal()) / 5);
                // Hiển thị dữ liệu
                $view_name = 'admin_user';
                break;
            case 'comment':
                include_once "model/m_admin_comment.php";
                $laycancobinhluan = laycanhobinhluan();
                # code...
                $view_name = 'admin_comment';
                break;

            case 'binhlancuamotcanho':
                include_once "model/m_admin_comment.php";


                if (isset($_GET['mach'])) {
                    $mach = $_GET['mach'];
                    $binhluancumotcanho = laycanhobinhluanbymach($mach);
                    if (count($binhluancumotcanho) < 1) {
                        header('location: index.php?mod=admin&act=comment');
                    }
                }
                if (isset($_POST['submit'])) {
                    $matk = $_SESSION['user']['MaTK'];
                    $mabl = $_POST['mabl'];
                    $noidung = $_POST['noidung'];
                    if (kientracophanhoi($mabl)) {
                        xoaphanhoi($mabl);
                        guiphanhoi($mabl, $matk, $noidung);
                        header('location: index.php?mod=admin&act=binhlancuamotcanho&mach=' . $mach);
                    } else {
                        guiphanhoi($mabl, $matk, $noidung);
                        header('location: index.php?mod=admin&act=binhlancuamotcanho&mach=' . $mach);
                    }
                }
                if (isset($_POST['delete'])) {
                    DeleteCommentADMIN($_POST['mabl']);
                    DeleteComment($_POST['mabl']);
                    header('location: index.php?mod=admin&act=binhlancuamotcanho&mach=' . $mach);
                }
                $view_name = 'admin_binhluanctch';
                break;

            case 'user-add':
                // Lấy dữ liệu
                include_once 'model/m_user.php';
                if (isset($_POST['submit'])) {
                    $SoDienThoai = $_POST['SoDienThoai'];
                    $TenKhachHang = $_POST['TenKhachHang'];
                    $Email = $_POST['Email'];
                    $Quyen = $_POST['Quyen'];
                    $kq = user_checkPhone($SoDienThoai);
                    if ($kq) {
                        // Đúng -> bị trùng -> không thêm
                        $_SESSION['loi'] = 'Không thể tạo tài khoản với số điện thoại <strong>' . $SoDienThoai . '</strong>';
                    } else {
                        // Sai -> không trùng -> thêm tài khoản
                        $MatKhau = 12345;
                        $HinhAnh = 'default.jpg';
                        user_add($SoDienThoai, $TenKhachHang, $MatKhau, $Email, $HinhAnh, $Quyen);
                        $_SESSION['thongbao'] = 'Đã tạo tài khoản với số điện thoại <strong>' . $SoDienThoai . '</strong> và mật khẩu mật định là <strong>' . $MatKhau . '</strong> thành công!!!';
                    }
                }
                // Hiển thị dữ liệu
                $view_name = 'admin_user_add';
                break;

            case 'user-edit':
                // Lấy dữ liệu
                include_once 'model/m_user.php';
                $MaTK = $_GET['id'];
                if (isset($_POST['submit'])) {
                    $SoDienThoai = $_POST['SoDienThoai'];
                    $TenKhachHang = $_POST['TenKhachHang'];
                    $Email = $_POST['Email'];
                    $Quyen = $_POST['Quyen'];
                    $DiaChiKhachHang = $_POST['DiaChiKhachHang'];
                    $kq = user_checkPhone($SoDienThoai);
                    echo $MaTK, $TenKhachHang, $SoDienThoai, $Email, $Quyen, $DiaChiKhachHang;
                    if ($kq && $kq['MaTK'] != $MaTK) {
                        // Đúng -> bị trùng -> không thêm
                        $_SESSION['loi'] = 'Số điện thoại <strong>' . $SoDienThoai . '</strong> đã tồn tại';
                    } else {
                        // Sai -> không trùng -> thêm tài khoản
                        user_edit($MaTK, $TenKhachHang, $SoDienThoai, $Email, $Quyen, $DiaChiKhachHang);
                        $_SESSION['thongbao'] = 'Đã cập nhật thông tin tài khoản thành công!!!';
                    }
                }
                $tk = user_getByID($MaTK);
                // Hiển thị dữ liệu
                $view_name = 'admin_user_edit';
                break;

            case 'user-delete':
                // Lấy dữ liệu
                include_once 'model/m_user.php';
                user_delete($_GET['MaTK']);
                header('Location: index.php?mod=admin&act=user');
                break;

                /* // Lấy dữ liệu
                include_once 'model/m_user.php';
                // Hiển thị dữ liệu
                if (isset($_GET['MaTK'])) {
                    $MaTK = $_GET['MaTK'];
                    $result = user_delete($MaTK);
                    header('Location: index.php?mod=admin&act=user');
                } else {
                    $_SESSION['loi'] = 'Xóa tài khoản thất bại!!!';
                }
                // Hiển thị dữ liệu
                $view_name = 'admin_user';
                break; */

            case 'statistic':
                // Lấy dữ liệu

                // Hiển thị dữ liệu
                $view_name = 'admin_statistic';
                break;

            case 'manage':
                // Lấy dữ liệu
                include_once 'model/m_admin_manage.php';
                $type = type();

                if (isset($_GET['MaLoai'])) {
                    $loai = $_GET['MaLoai'];
                    // echo "Tên: " . $loai;
                    $page = 1;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    }
                    $product = product_home_type($loai, $page);
                    $sotrang = ceil(intval(product_home_type_dem($loai)) / 8);
                } else {
                    $page = 1;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    }
                    $product = product_home($page);
                    $sotrang = ceil(intval(product_home_dem()) / 8);
                    // echo "Tham số 'MaLoai' không tồn tại trong URL.";
                }
                // Hiển thị dữ liệu
                $view_name = 'admin_manage';
                break;

            case 'manage-edit':
                // Lấy dữ liệu
                include_once 'model/m_admin_manage.php';
                $MaCH = $_GET['MaCH'];
                $tk = product_m($MaCH);
                $image = get_CH($MaCH);

                if (isset($_POST['submit'])) {
                    $TenCanHo = $_POST['TenCanHo'];
                    $GiaCH = $_POST['GiaCH'];
                    // $MaHA = $_POST['MaHA'];
                    $MoTaCH = $_POST['MoTaCH'];
                    $DiaChiCH = $_POST['DiaChiCH'];
                    $MaKV = $_POST['MaKV'];
                    $TrangThai = $_POST['TrangThai'];
                    $MaLoai = $_POST['MaLoai'];
                    $DienTich = $_POST['DienTich'];
                    $SoPhong = $_POST['SoPhong'];
                    $Hinh[0] = basename($_FILES['Hinh1']['name']);
                    $Hinh[1] = basename($_FILES['Hinh2']['name']);
                    $Hinh[2] = basename($_FILES['Hinh3']['name']);
                    $Hinh[3] = basename($_FILES['Hinh4']['name']);
                    // update_image($image['maha'], $Hinh1, $Hinh2, $Hinh3, $Hinh4);
                    // echo $image['maha'];
                    $arrayha =  ha_check($MaCH);
                    for ($i = 0; $i < 4; $i++) {
                        if ($Hinh[$i] != null) {
                            $j = $i + 1;
                            echo '123';
                            $file_to_delete = 'uploads/product/' . $image['Hinh' . $j . ''];
                            // Kiểm tra xem tệp tin tồn tại trước khi cố gắng xóa
                            if (file_exists($file_to_delete)) {
                                // Cố gắng xóa tệp tin
                                $target_dir = 'uploads/product/';
                                if (unlink($file_to_delete)) {
                                    $target_file = $target_dir . $Hinh[$i];
                                    move_uploaded_file($_FILES["Hinh$j"]["tmp_name"], $target_file);
                                    // echo "Xóa tệp tin thành công.";
                                } else {
                                    // echo "Lỗi khi xóa tệp tin."; $target_dir = 'uploads/product/';
                                    $target_file = $target_dir . $Hinh[$i];
                                    move_uploaded_file($_FILES["Hinh$j"]["tmp_name"], $target_file);
                                }
                            } else {
                                // echo "Tệp tin không tồn tại.";
                                $target_dir = 'uploads/product/';
                                $target_file = $target_dir . $Hinh[$i];
                                move_uploaded_file($_FILES["Hinh$j"]["tmp_name"], $target_file);
                            }


                            ha_update($Hinh[$i], $arrayha[$i]['MaHA']);
                        }
                    }
                    product_edit($MaCH, $TenCanHo, $GiaCH, $MoTaCH, $DiaChiCH, $MaKV, $TrangThai, $MaLoai, $DienTich, $SoPhong);
                    header('location: index.php?mod=admin&act=manage');
                }

                // Hiển thị dữ liệu
                $view_name = 'admin_manage_edit';
                break;

            case 'manage-add':
                // Lấy dữ liệu
                include_once 'model/m_admin_manage.php';
                if (isset($_POST['submit'])) {
                    $TenCanHo = $_POST['TenCanHo'];
                    $GiaCH = $_POST['GiaCH'];
                    // $MaHA = $_POST['MaHA'];
                    $MoTaCH = $_POST['MoTaCH'];
                    $DiaChiCH = $_POST['DiaChiCH'];
                    $MaKV = $_POST['MaKV'];
                    $TrangThai = $_POST['TrangThai'];
                    $MaLoai = $_POST['MaLoai'];
                    $DienTich = $_POST['DienTich'];
                    $SoPhong = $_POST['SoPhong'];
                    $Hinh1 = basename($_FILES['Hinh1']['name']);
                    $Hinh2 = basename($_FILES['Hinh2']['name']);
                    $Hinh3 = basename($_FILES['Hinh3']['name']);
                    $Hinh4 = basename($_FILES['Hinh4']['name']);

                    product_add($TenCanHo, $GiaCH, $MoTaCH, $DiaChiCH, $MaKV, $TrangThai, $MaLoai, $DienTich, $SoPhong);
                    $ch_check = ch_check();
                    image_add(intval($ch_check['maxch']), $Hinh1);
                    image_add(intval($ch_check['maxch']), $Hinh2);
                    image_add(intval($ch_check['maxch']), $Hinh3);
                    image_add(intval($ch_check['maxch']), $Hinh4);

                    $target_dir = 'uploads/product/';
                    $target_file = $target_dir . $Hinh1;
                    move_uploaded_file($_FILES["Hinh1"]["tmp_name"], $target_file);

                    $target_dir = 'uploads/product/';
                    $target_file = $target_dir . $Hinh2;
                    move_uploaded_file($_FILES["Hinh2"]["tmp_name"], $target_file);

                    $target_dir = 'uploads/product/';
                    $target_file = $target_dir . $Hinh3;
                    move_uploaded_file($_FILES["Hinh3"]["tmp_name"], $target_file);

                    $target_dir = 'uploads/product/';
                    $target_file = $target_dir . $Hinh4;
                    move_uploaded_file($_FILES["Hinh4"]["tmp_name"], $target_file);
                    $_SESSION['thongbao'] = 'Đã thêm căn hộ thành công!!!';
                }
                //  else {
                //     echo 'Thất bại';
                // }
                // Hiển thị dữ liệu
                $view_name = 'admin_manage_add';
                break;

            case 'manage-delete':
                // Lấy dữ liệu
                include_once 'model/m_admin_manage.php';
                // Hiển thị dữ liệu
                if (isset($_GET['MaCH'])) {
                    $MaCH = $_GET['MaCH'];
                    ha_delete($MaCH);
                    $result = delete_can_ho($MaCH);
                    header('Location: index.php?mod=admin&act=manage');
                } else {
                    // $_SESSION['loi'] = 'Xóa căn hộ tức thất bại!!!';
                }

                // Hiển thị dữ liệu
                $view_name = 'admin_manage_delete';
                break;

            case 'khuvuc':
                include_once 'model/m_admin_khuvuc.php';
                $khuvuc = khuvuc();

                $view_name = 'admin_khuvuc';
                break;
            case 'khuvuc-add':
                include_once 'model/m_admin_khuvuc.php';
                $khuvuc = khuvuc();
                if (isset($_POST['submit'])) {
                    $TenKhuVuc = $_POST['TenKhuVuc'];
                    khuvuc_add($TenKhuVuc);
                    $_SESSION['thongbao'] = 'Đã thêm khu vực thành công!!!';
                }
                $view_name = 'admin_khuvuc_add';
                break;

            case 'khuvuc-edit':
                include_once 'model/m_admin_khuvuc.php';
                $MaKV = $_GET['MaKV'];
                $kv = khuvuc_check($MaKV);
                if (isset($_POST['submit'])) {
                    $TenKhuVuc = $_POST['TenKhuVuc'];
                    khuvuc_edit($MaKV, $TenKhuVuc);
                    $_SESSION['thongbao'] = 'Đã thêm khu vực thành công!!!';
                    header('location: index.php?mod=admin&act=khuvuc');
                }
                $view_name = 'admin_khuvuc_edit';
                break;

            case 'khuvuc-delete':
                include_once 'model/m_admin_khuvuc.php';

                if (isset($_GET['MaKV'])) {
                    $MaKV = $_GET['MaKV'];
                    $result = delete_khuvuc($MaKV);
                    $_SESSION['thongbao'] = 'Đã xóa khu vực thành công!!!';
                    header('Location: index.php?mod=admin&act=khuvuc');
                } else {
                    $_SESSION['loi'] = 'Xóa căn hộ tức thất bại!!!';
                }

                $view_name = 'admin_khuvuc_delete';
                break;


            case 'loai':
                include_once 'model/m_admin_loai.php';
                $loai = loai();

                $view_name = 'admin_loai';
                break;

            case 'loai-add':
                include_once 'model/m_admin_loai.php';
                $loai = loai();
                if (isset($_POST['submit'])) {
                    $TenLoai = $_POST['TenLoai'];
                    loai_add($TenLoai);
                    $_SESSION['thongbao'] = 'Đã thêm khu vực thành công!!!';
                }
                $view_name = 'admin_loai_add';
                break;

            case 'loai-edit':
                include_once 'model/m_admin_loai.php';
                $MaLoai = $_GET['MaLoai'];
                $loai = loai_check($MaLoai);
                if (isset($_POST['submit'])) {
                    $TenLoai = $_POST['TenLoai'];
                    loai_edit($MaLoai, $TenLoai);
                    $_SESSION['thongbao'] = 'Đã thêm loai thành công!!!';
                    header('location: index.php?mod=admin&act=loai');
                }
                $view_name = 'admin_loai_edit';
                break;

            case 'loai-delete':
                include_once 'model/m_admin_loai.php';

                if (isset($_GET['MaLoai'])) {
                    $MaLoai = $_GET['MaLoai'];
                    $result = delete_loai($MaLoai);
                    $_SESSION['thongbao'] = 'Đã xóa khu vực thành công!!!';
                    header('Location: index.php?mod=admin&act=loai');
                } else {
                    $_SESSION['loi'] = 'Xóa căn hộ tức thất bại!!!';
                }

                $view_name = 'admin_loai_delete';
                break;


            case 'quanlytin':
                include_once 'model/m_admin_tin_tuc.php';
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $tin_tuc = show_tin_tuc($page);
                $totalPages = count_tin_pages();
                // Xóa dữ liệu theo mã tin tức
                if (isset($_GET['MaTT'])) {
                    $MaTT = $_GET['MaTT'];
                    $result = delete_tin_tuc($MaTT);

                    header('Location: index.php?mod=admin&act=quanlytin');
                } else {
                    // $_SESSION['loi'] = 'Xóa tin tức thất bại!!!';
                }

                $view_name = 'admin_tin_tuc';
                break;
            case 'an_tin':
                include_once 'model/m_admin_tin_tuc.php';
                $idTin = $_GET['MaTT'];
                an_tin($idTin);
                header("location: index.php?mod=admin&act=quanlytin");
                break;
            case 'hien_tin':
                include_once 'model/m_admin_tin_tuc.php';
                $idTin = $_GET['MaTT'];
                hien_tin($idTin);
                header("location: index.php?mod=admin&act=quanlytin");
                break;
            case 'quanlytin_add':
                include_once 'model/m_admin_tin_tuc.php';
                if (isset($_POST['submit'])) {
                    $TieuDe = $_POST['TieuDe'];
                    $MoTa = $_POST['MoTa'];
                    $MaKV = $_POST['MaKV'];
                    $NoiDung = $_POST['NoiDung'];
                    $HinhAnh = $_POST['HinhAnh'];
                    $TrangThai = $_POST['TrangThai'];

                    add_tin_tuc($TieuDe, $MoTa, $MaKV, $NoiDung, $HinhAnh, $TrangThai);
                    header('Location: index.php?mod=admin&act=quanlytin');
                } else {
                    $_SESSION['loi'] = 'Thêm tin tức thất bại!!!';
                }
                $view_name = 'admin_tin_tuc_add';
                break;

            case 'quanlytin_edit':
                include_once 'model/m_admin_tin_tuc.php';

                // Kiểm tra nếu có dữ liệu POST từ form sửa tin tức
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $MaTT = $_GET['MaTT'];
                    $TieuDe = $_POST['TieuDe'];
                    $MoTa = $_POST['MoTa'];
                    $MaKV = $_POST['MaKV'];
                    $HinhAnh = $_POST['HinhAnh'];
                    $TrangThai = $_POST['TrangThai'];
                    $NoiDung = $_POST['NoiDung'];

                    edit_tin_tuc($MaTT, $TieuDe, $MoTa, $MaKV, $HinhAnh, $TrangThai,  $NoiDung);

                    header('Location: index.php?mod=admin&act=quanlytin');
                } else {
                    $_SESSION['loi'] = 'Thêm tin tức thất bại!!!';
                }

                $view_name = 'admin_tin_tuc_edit';
                break;

            case 'contact':
                include_once 'model/m_admin_contact.php';
                $dsLH = Get_Contact();
                $view_name = 'admin_contact';
                break;

            case 'order':
                // Lấy dữ liệu
                include_once 'model/m_admin_order.php';
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                if (isset($_GET['dang_duyet'])) {
                    $dsdon_hang = get_orderLoai($page, 'dang_duyet');
                    $soTrang = ceil(intval(order_getAllTotalLoai('dang_duyet')) / 5);
                } else if (isset($_GET['da_tra'])) {
                    $dsdon_hang = get_orderLoai($page, 'da_tra');
                    $soTrang = ceil(intval(order_getAllTotalLoai('da_tra')) / 5);
                } else if (isset($_GET['tre'])) {
                    $dsdon_hang = get_orderTre($page);
                    $soTrang = ceil(intval(order_getAllTotalTre()) / 5);
                } else if (isset($_GET['dang_tra'])) {
                    $dsdon_hang = get_orderLoai($page, 'dang_tra');
                    $soTrang = ceil(intval(order_getAllTotalLoai('dang_tra')) / 5);
                } else if (isset($_GET['dang_huy'])) {
                    $dsdon_hang = get_orderLoai($page, 'dang_huy');
                    $soTrang = ceil(intval(order_getAllTotalLoai('dang_huy')) / 5);
                } else if (isset($_GET['da_nhan'])) {
                    $dsdon_hang = get_orderLoai($page, 'da_nhan');
                    $soTrang = ceil(intval(order_getAllTotalLoai('da_nhan')) / 5);
                } else if (isset($_GET['da_huy'])) {
                    $dsdon_hang = get_orderLoai($page, 'da_huy');
                    $soTrang = ceil(intval(order_getAllTotalLoai('da_huy')) / 5);
                } else {
                    $dsdon_hang = get_order($page,);
                    $soTrang = ceil(intval(order_getAllTotal()) / 5);
                }
                // Hiển thị dữ liệu
                $view_name = 'admin_order';
                break;
            case 'order-edit':
                // Lấy dữ liệu
                include_once 'model/m_admin_order.php';
                $MaDH = $_GET['id'];
                if (isset($_POST['submit'])) {
                    $TrangThai = $_POST['TrangThai'];
                    order_edit($MaDH, $TrangThai);
                    $_SESSION['thongbao'] = 'Đã cập nhật trạng thái đơn hàng thành công!!!';
                }
                $dh = order_getByID($MaDH);
                // Lấy ra thông tin người lập dơn từ hàm  
                $TaiKhoan =  order_getByIDuser($dh['MaTK']);
                include_once "model/m_user_product.php";
                $apartment_rentnow = getApartment_rentnow($dh['MaCH']);


                // Hiển thị dữ liệu
                $view_name = 'admin_order_edit';
                break;

                // Hiển thị dữ liệu
                $view_name = 'admin_order_edit';
                break;

            case 'DeleteContact':
                include_once 'model/m_admin_contact.php';
                // if(isset([''])){

                // };

                $view_name = 'admin_contact';
                break;

            default:
                # code...
                break;
        }
        include_once 'view/v_admin_layout.php';
    } else {
        header("location: index.php?mod=page&act=home");
    }
} else {
    header("location: index.php?mod=page&act=home");
}

<?php
include_once 'm_pdo.php';
// Tăng lượt xem cho căn hộ 
function updatEye($id)
{
    return pdo_execute("UPDATE `can_ho` SET `LuotXem`= LuotXem+1 WHERE MaCH=$id");
}
// Lấy dữ liệu của căn hộ có id
function getProduct($id, $MaTK)
{
    return pdo_query_one(" SELECT * FROM can_ho ch LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho INNER JOIN loai l ON ch.MaLoai=l.MaLoai  LEFT JOIN(SELECT MaCH soch,COUNT(MaCH) slyt,AVG(SoSao) saotb FROM `binh_luan` GROUP BY MaCH) bansao ON bansao.soch=ch.MaCH LEFT JOIN (SELECT COUNT(MaCH) tong_like, MaCH AS nha FROM `yeu_thich` GROUP BY MaCH ) yt ON yt.nha=ch.MaCH LEFT JOIN (SELECT MaYT MaCTYT, MaCH AS canhoyt FROM `yeu_thich` WHERE MaTK=$MaTK) ctyt ON ctyt.canhoyt=ch.MaCH INNER JOIN khu_vuc kv ON kv.MaKV=ch.MaKV WHERE ch.TrangThai='1' AND ch.MaCH=$id");
}
// Lấy dữ liệu các căn hộ cùng loại
function getProduct_location($idkv, $idApartment, $idTK)
{
    return pdo_query("SELECT * FROM can_ho ch LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho INNER JOIN loai l ON ch.MaLoai=l.MaLoai LEFT JOIN(SELECT MaCH soch,COUNT(MaCH) slyt,AVG(SoSao) saotb FROM `binh_luan` GROUP BY MaCH) bansao ON bansao.soch=ch.MaCH LEFT JOIN (SELECT COUNT(MaCH) tong_like, MaCH AS nha FROM `yeu_thich` GROUP BY MaCH ) yt ON yt.nha=ch.MaCH LEFT JOIN (SELECT MaYT MaCTYT, MaCH AS canhoyt FROM `yeu_thich` WHERE MaTK=$idTK) ctyt ON ctyt.canhoyt=ch.MaCH INNER JOIN khu_vuc kv ON kv.MaKV=ch.MaKV WHERE ch.TrangThai='1' AND ch.MaKV=$idkv AND  ch.MaCH<>$idApartment ORDER BY RAND() LIMIT 10");
}
// Lấy dữ liệu của căn hộ có id
function getApartment_rentnow($id)
{
    return pdo_query_one("SELECT * FROM `can_ho` WHERE MaCH=?", $id);
}
// Thêm đơn thuê mới 
function rentNow($MaTK, $MaCH, $ngaynhan, $ngaytra, $giach)
{
    return pdo_execute("INSERT INTO `don_hang`(`MaTK`, `MaCH`, `NgayNhan`, `NgayTra`,NgayTraDuKien,GiaCHHT) VALUES (?,?,?,?,?,?)", $MaTK, $MaCH, $ngaynhan, $ngaytra, $ngaytra, $giach);
}
// Lấy ra các đơn hàng đã có của căn hộ để ẩn đi 
function get_rentNowDate($MaCH)
{
    return pdo_query("SELECT * FROM `don_hang` WHERE TrangThai <>'da_huy' AND MaCH=$MaCH");
}

// Kiểm tra xem tk đã từng thuê căn hộ hay chưa
function get_historyRent($MaTK, $MaCH)
{
    return pdo_query("SELECT COUNT(MaCH) soluong FROM `don_hang` WHERE MaTK=$MaTK AND MaCH=$MaCH AND TrangThai<>'da_huy'");
}

// lưu đánh giá của người dùng dành cho căn hộ đã thuê
function save_comment($MaTK, $MaCH, $noidung, $sosao)
{
    return pdo_execute("INSERT INTO `binh_luan`( `MaCH`, `MaTK`, `NoiDung`, `SoSao`) VALUES (?,?,?,?)", $MaCH, $MaTK, $noidung, $sosao);
}
// lấy đánh giá của người dùng dành cho căn hộ đã thuê
function get_comment($MaCH)
{
    return pdo_query("SELECT * FROM `binh_luan`
    INNER JOIN can_ho c on binh_luan.MaCH = c.MaCH
    INNER JOIN (SELECT MaCH,COUNT(MaCH) FROM `binh_luan` GROUP BY MaCH) sl ON sl.MaCH = c.MaCH
    INNER JOIN tai_khoan t ON binh_luan.MaTK=t.MaTK LEFT JOIN (SELECT ph.MaPH, ph.MaBL mabl , ph.MaTK matk1, ph.NoiDung NDadmin  , ph.NgayDang ngaydang, tk.MaTK, tk.TenKhachHang Tenadmin, tk.MatKhau , tk.SoDienThoai , tk.Email , tk.HinhAnh Anhadmin, tk.Quyen , tk.DiaChiKhachHang FROM phan_hoi ph INNER JOIN tai_khoan tk ON tk.MaTK = ph.MaTK ) ph ON ph.MaBL = binh_luan.MaBL
    WHERE c.MaCH = $MaCH ORDER BY binh_luan.NgayDang DESC");
}

// lấy tất cả các căn hộ được yêu thích
function get_heart($MaTK)
{
    return pdo_query("SELECT  ch.*,ha.* ,ss.*,yt.MaCH mach2, yt.MaYT FROM  yeu_thich yt INNER JOIN can_ho ch ON ch.MaCH=yt.MaCH LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho  LEFT JOIN (SELECT AVG(SoSao) AS sosao,MaCH as mach  FROM `binh_luan` GROUP BY MaCH) ss ON ss.mach=ch.MaCH WHERE yt.MaTK=$MaTK");
}

// Tiềm kiếm mã yêu thích của tài khoản
function search_heart($MaTK, $MaCH)
{
    return pdo_query_one("SELECT MaYT FROM `yeu_thich` WHERE MaTK=$MaTK AND MaCH=$MaCH");
}
// Xóa căn hộ trong chi tiết yêu thích yêu thích 
function delete_heart($MaYT)
{
    return pdo_execute("DELETE FROM `yeu_thich` WHERE MaYT=? ", $MaYT);
}
// Thêm vào một chi tiết yêu thích cho tài khoản
function insert_heartYT($MaTK, $MaCH)
{
    return pdo_execute("INSERT INTO  `yeu_thich`(`MaTK`, `MaCH`) VALUES (?,?)", $MaTK, $MaCH);
}

// Lấy ra các đơn hàng được thuê của tài khoản
function search_history($MaTK)
{
    return pdo_query("SELECT ch.*,ha.*,dh.MaDH,dh.MaTK,dh.MaCH mach,dh.NgayTraDuKien,dh.NgayLapDon,dh.NgayNhan,dh.NgayTra,dh.TrangThai,dh.GiaCHHT FROM `don_hang` dh INNER JOIN can_ho ch ON dh.MaCH=ch.MaCH LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho WHERE MaTK=$MaTK ORDER BY dh.NgayLapDon DESC");
}
// Hàm thay đổi trạng thái đơn sang đang hủy

function updeta_historyHuy($MaDH)
{
    return pdo_execute("UPDATE `don_hang` SET `TrangThai`='dang_huy' WHERE MaDH=?", $MaDH);
}
// Hàm trả thay đổi trạng thái đơn hàng sang đang trả
function updeta_historyTra($MaDH)
{
    return pdo_execute("UPDATE `don_hang` SET `TrangThai`='dang_tra' WHERE MaDH=?", $MaDH);
}

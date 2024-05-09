<?php
include_once 'm_pdo.php';
// Lấy 3 căn hộ vừa được cập nhật 
function news_Apartment()
{
    return pdo_query("SELECT * FROM can_ho ch LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH
    GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho INNER JOIN loai l ON ch.MaLoai=l.MaLoai WHERE ch.TrangThai='1' ORDER BY ch.MaCH DESC  LIMIT 3");
}
function topLike_Apartment($MaTK)
{
    return pdo_query("SELECT * FROM can_ho ch LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho INNER JOIN loai l ON ch.MaLoai=l.MaLoai LEFT JOIN(SELECT MaCH soch,COUNT(MaCH) slyt,AVG(SoSao) saotb FROM `binh_luan` GROUP BY MaCH) bansao ON bansao.soch=ch.MaCH LEFT JOIN (SELECT COUNT(MaCH) tong_like, MaCH AS nha FROM `yeu_thich` GROUP BY MaCH ) yt ON yt.nha=ch.MaCH LEFT JOIN (SELECT MaYT MaCTYT, MaCH AS canhoyt FROM `yeu_thich` WHERE MaTK=?) ctyt ON ctyt.canhoyt=ch.MaCH WHERE ch.TrangThai='1' ORDER BY yt.tong_like DESC LIMIT 6", $MaTK);
}
// Lấy ra 6 căn hộ được xem nhiều nhất
function topEye_Apartment($MaTK)
{
    return pdo_query("SELECT * FROM can_ho ch LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho INNER JOIN loai l ON ch.MaLoai=l.MaLoai LEFT JOIN(SELECT MaCH soch,COUNT(MaCH) slyt,AVG(SoSao) saotb FROM `binh_luan` GROUP BY MaCH) bansao ON bansao.soch=ch.MaCH LEFT JOIN (SELECT COUNT(MaCH) tong_like, MaCH AS nha FROM `yeu_thich` GROUP BY MaCH ) yt ON yt.nha=ch.MaCH LEFT JOIN (SELECT MaYT MaCTYT, MaCH AS canhoyt FROM `yeu_thich` WHERE MaTK=?) ctyt ON ctyt.canhoyt=ch.MaCH WHERE ch.TrangThai='1' ORDER BY ch.LuotXem DESC LIMIT 6", $MaTK);
}

// lấy ra 3 bình luận tiêu biểu gần nhất
// Lấy ra 6 căn hộ được xem nhiều nhất
function topComment()
{
    return pdo_query("SELECT * FROM `binh_luan` INNER JOIN tai_khoan tk ON binh_luan.MaTK=tk.MaTK  WHERE SoSao=5 ORDER BY NgayDang DESC LIMIT 3");
}

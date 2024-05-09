<?php
include_once 'm_pdo.php';

function laycanhotheotrang($MaTK, $khuvuc, $loai, $limit = 0, $page = 1)
{
    $batdau = ($page - 1) * 2;
    $sql = "SELECT * FROM can_ho c  LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON c.MaCH=ha.canho
    INNER JOIN loai l ON c.MaLoai=l.MaLoai INNER JOIN khu_vuc kv ON kv.MaKV = c.MaKV
    LEFT JOIN (SELECT MaCH soch,COUNT(MaCH) slyt,AVG(SoSao) saotb FROM `binh_luan` GROUP BY MaCH) bansao ON bansao.soch = c.MaCH
    LEFT JOIN (SELECT COUNT(MaCH) tong_like, MaCH AS nha FROM `yeu_thich` GROUP BY MaCH ) yt ON yt.nha=c.MaCH LEFT JOIN (SELECT MaYT MaCTYT, MaCH AS canhoyt FROM `yeu_thich` WHERE MaTK=$MaTK) ctyt ON ctyt.canhoyt=c.MaCH";
    if ($loai) {

        $sql .= " WHERE c.MaLoai = $loai";
    }
    if ($khuvuc) {
        $sql .= " WHERE c.MaKV = $khuvuc";
    }
    if ($limit > 0) {
        $sql .= " LIMIT $batdau,$limit";
    }
    return pdo_query($sql);
}
function sosanpham($MaTK, $khuvuc, $loai, $giathap, $giacao)
{
    $sql = "SELECT count(*) FROM can_ho c  LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON c.MaCH=ha.canho
    INNER JOIN loai l ON c.MaLoai=l.MaLoai INNER JOIN khu_vuc kv ON kv.MaKV = c.MaKV
    LEFT JOIN (SELECT MaCH soch,COUNT(MaCH) slyt,AVG(SoSao) saotb FROM `binh_luan` GROUP BY MaCH) bansao ON bansao.soch = c.MaCH
   
    LEFT JOIN (SELECT COUNT(MaCH) tong_like, MaCH AS nha FROM `yeu_thich` GROUP BY MaCH ) yt ON yt.nha=c.MaCH LEFT JOIN (SELECT MaYT MaCTYT, MaCH AS canhoyt FROM `yeu_thich` WHERE MaTK=$MaTK) ctyt ON ctyt.canhoyt=c.MaCH";
    if ($loai) {
        $sql .= " WHERE c.MaLoai = $loai";
    }
    if ($khuvuc) {
        $sql .= " WHERE c.MaKV = $khuvuc";
    }
    if ($giathap != "" && $giacao != "") {
        $sql .= " WHERE c.GiaCH BETWEEN $giathap AND $giacao";
    }
    return pdo_query_value($sql);
}
function layloaicanho()
{
    $sql = "SELECT * FROM loai";
    return pdo_query($sql);
}
function laycanhotheokhoanggia($MaTK, $giathap, $giacao, $limit = 0, $page = 1)
{
    $batdau = ($page - 1) * 2;
    $sql = "SELECT * FROM can_ho c  LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON c.MaCH=ha.canho
    INNER JOIN loai l ON c.MaLoai=l.MaLoai INNER JOIN khu_vuc kv ON kv.MaKV = c.MaKV
    LEFT JOIN (SELECT MaCH soch,COUNT(MaCH) slyt,AVG(SoSao) saotb FROM `binh_luan` GROUP BY MaCH) bansao ON bansao.soch = c.MaCH
    LEFT JOIN (SELECT COUNT(MaCH) tong_like, MaCH AS nha FROM `yeu_thich` GROUP BY MaCH ) yt ON yt.nha=c.MaCH LEFT JOIN (SELECT MaYT MaCTYT, MaCH AS canhoyt FROM `yeu_thich` WHERE MaTK=$MaTK) ctyt ON ctyt.canhoyt=c.MaCH
    WHERE c.GiaCH BETWEEN $giathap AND $giacao";
    if ($limit > 0) {
        $sql .= " LIMIT $batdau,$limit";
    }
    return pdo_query($sql);
}
function laycantimkiem($ngaynhan, $ngaytra, $diadiem, $limit = 0, $page = 1)
{
    $batdau = ($page - 1) * 2;
    $sql = "SELECT * FROM can_ho ch  LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho  INNER JOIN loai l ON ch.MaLoai=l.MaLoai  
    LEFT JOIN (SELECT COUNT(MaCH) tong_like, MaCH AS nha FROM `yeu_thich` GROUP BY MaCH ) yt ON yt.nha=ch.MaCH LEFT JOIN (SELECT MaYT MaCTYT, MaCH AS canhoyt FROM `yeu_thich` WHERE MaTK=0) ctyt ON ctyt.canhoyt=ch.MaCH LEFT JOIN(SELECT MaCH soch,COUNT(MaCH) slyt,AVG(SoSao) saotb FROM `binh_luan` GROUP BY MaCH) bansao ON bansao.soch=ch.MaCH LEFT JOIN (SELECT ch.MaCH,
       COUNT(dh.MaDH) AS SoLuongDonHang
FROM can_ho ch
LEFT JOIN don_hang dh ON ch.MaCH = dh.MaCH
WHERE ((dh.NgayTra <= '$ngaytra' AND dh.NgayTra > '$ngaynhan' AND dh.NgayNhan <= '$ngaynhan')
        OR (dh.NgayNhan >= '$ngaynhan' AND dh.NgayNhan < '$ngaytra' AND dh.NgayTra >= '$ngaytra')
        OR (dh.NgayNhan < '$ngaynhan' AND dh.NgayTra > '$ngaytra')
        OR ((dh.NgayNhan = '$ngaynhan') AND (dh.NgayTra = '$ngaytra')))
       AND dh.TrangThai <> 'da_huy'
GROUP BY ch.MaCH
) loaitru ON loaitru.MaCH=ch.MaCH INNER JOIN khu_vuc kv ON kv.MaKV = ch.MaKV
 WHERE ch.TrangThai='1' AND loaitru.SoLuongDonHang IS NUll AND kv.MaKV = $diadiem";
    if ($limit > 0) {
        $sql .= " LIMIT $batdau,$limit";
    }
    return pdo_query($sql);
}
function solaycanho($ngaynhan, $ngaytra, $diadiem)
{
    $sql = "SELECT count(*) FROM can_ho ch  LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho INNER JOIN loai l ON ch.MaLoai=l.MaLoai  LEFT JOIN (SELECT MaCH soch,COUNT(MaCH) slyt,AVG(SoSao) saotb FROM `binh_luan` GROUP BY MaCH) bansao ON bansao.soch = ch.MaCH
    LEFT JOIN (SELECT COUNT(MaCH) tong_like, MaCH AS nha FROM `yeu_thich` GROUP BY MaCH ) yt ON yt.nha=ch.MaCH LEFT JOIN (SELECT MaYT MaCTYT, MaCH AS canhoyt FROM `yeu_thich` WHERE MaTK=0) ctyt ON ctyt.canhoyt=ch.MaCH
        LEFT JOIN (SELECT ch.MaCH,
       COUNT(dh.MaDH) AS SoLuongDonHang
FROM can_ho ch
LEFT JOIN don_hang dh ON ch.MaCH = dh.MaCH
WHERE ((dh.NgayTra <= '$ngaytra' AND dh.NgayTra > '$ngaynhan' AND dh.NgayNhan <= '$ngaynhan')
        OR (dh.NgayNhan >= '$ngaynhan' AND dh.NgayNhan < '$ngaytra' AND dh.NgayTra >= '$ngaytra')
        OR (dh.NgayNhan < '$ngaynhan' AND dh.NgayTra > '$ngaytra')
        OR ((dh.NgayNhan = '$ngaynhan') AND (dh.NgayTra = '$ngaytra')))
       AND dh.TrangThai <> 'da_huy'
GROUP BY ch.MaCH
) loaitru ON loaitru.MaCH=ch.MaCH INNER JOIN khu_vuc kv ON kv.MaKV = ch.MaKV
 WHERE ch.TrangThai='1' AND loaitru.SoLuongDonHang IS NUll AND kv.MaKV = $diadiem";
    return pdo_query_value($sql);
}
function laykvcanho($limit)
{
    $sql = "SELECT DISTINCT khu_vuc.* FROM `khu_vuc` INNER JOIN can_ho c ON khu_vuc.MaKV = c.MaKV LIMIT $limit";
    return pdo_query($sql);
}
function laych($limit)
{
    $sql = "SELECT * FROM  (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha INNER JOIN can_ho C ON  ha.canho= C.MaCH  ORDER BY C.LuotXem DESC LIMIT $limit";
    return pdo_query($sql);
}

function apartment_count()
{
    return pdo_query_value("SELECT COUNT(*) FROM can_ho");
} {
    return pdo_query_value("SELECT COUNT(*) FROM khu_vuc");
}
function area_count()
{
    return pdo_query_value("SELECT COUNT(*) FROM khu_vuc");
}

function category_count()
{
    return pdo_query_value("SELECT COUNT(*) FROM loai");
}

function tin_tuc_count()
{
    return pdo_query_value("SELECT COUNT(*) FROM tin_tuc");
}

function apartment_popular()
{
    return pdo_query("SELECT * FROM `can_ho` ORDER BY LuotXem DESC LIMIT 5");
}

function apartment_assess_best()
{
    return pdo_query("SELECT ch.*,AVG(bl.SoSao) FROM `can_ho` ch INNER JOIN binh_luan bl ON bl.MaCH=ch.MaCH  GROUP BY ch.MaCH ORDER BY AVG(bl.SoSao) DESC LIMIT 5");
}

function tin_tuc_moi()
{
    return pdo_query("SELECT * FROM `tin_tuc` ORDER BY NgayDang DESC LIMIT 5");
}

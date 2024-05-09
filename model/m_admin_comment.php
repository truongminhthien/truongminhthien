<?php
include_once "m_pdo.php";

function laycanhobinhluan()
{
    $sql = "SELECT ch.*,bl.MaTK,bl.NoiDung,bl.NgayDang,bl.SoSao, t.*,ha.* FROM `can_ho` ch INNER JOIN binh_luan bl on ch.MaCH=bl.MaCH INNER JOIN (SELECT can_ho.MaCH socanho,MAX(MaBL) mabl FROM `binh_luan` INNER JOIN can_ho on binh_luan.MaCH=can_ho.MaCH GROUP BY can_ho.MaCH) maxbl ON maxbl.mabl=bl.MaBL  LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho INNER JOIN tai_khoan t ON t.MaTK = bl.MaTK ORDER BY `bl`.`NgayDang` DESC";
    return pdo_query($sql);
}
function laycanhobinhluanbymach($mach)
{
    $sql = "SELECT * FROM `binh_luan`
    INNER JOIN can_ho c on binh_luan.MaCH = c.MaCH
    LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON c.MaCH=ha.canho
    INNER JOIN (SELECT MaCH,COUNT(MaCH) FROM `binh_luan` GROUP BY MaCH) sl ON sl.MaCH = c.MaCH
    INNER JOIN tai_khoan t ON binh_luan.MaTK=t.MaTK LEFT JOIN (SELECT ph.MaPH, ph.MaBL mabl , ph.MaTK matk1, ph.NoiDung NDadmin  , ph.NgayDang ngaydang, tk.MaTK, tk.TenKhachHang Tenadmin, tk.MatKhau , tk.SoDienThoai , tk.Email , tk.HinhAnh Anhadmin, tk.Quyen , tk.DiaChiKhachHang FROM phan_hoi ph INNER JOIN tai_khoan tk ON tk.MaTK = ph.MaTK ) ph ON ph.MaBL = binh_luan.MaBL
    WHERE c.MaCH = $mach ORDER BY binh_luan.NgayDang DESC";
    return pdo_query($sql);
}

function guiphanhoi($mabl, $matk, $noidung)
{
    return pdo_execute("INSERT INTO `phan_hoi`( `MaBL`, `MaTK`, `NoiDung`) VALUES (?,?,?)", $mabl, $matk, $noidung);
}

function kientracophanhoi($mabl)
{
    $sql = "SELECT * FROM `phan_hoi` WHERE MaBL = $mabl";
    return pdo_query_one($sql);
}

function xoaphanhoi($mabl)
{
    $sql = "DELETE FROM `phan_hoi` WHERE MaBL = $mabl";
    return pdo_execute($sql);
}
// Xóa đi bình luận theo mã bl
function DeleteComment($MaBl)
{
    return pdo_execute("DELETE FROM `binh_luan` WHERE MaBL=$MaBl");
}
// Xóa đi phản hồi của admin
function DeleteCommentADMIN($MaBl)
{
    return pdo_execute("DELETE FROM `phan_hoi` WHERE MaBL=$MaBl");
}

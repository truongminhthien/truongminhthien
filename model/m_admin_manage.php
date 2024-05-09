<?php
include_once 'm_pdo.php';
// lấy loại căn hộ
function type()
{
  return pdo_query("SELECT * FROM loai");
}

function product_home($page = 1)
{
  $batdau = ($page - 1) * 8;
  return pdo_query("SELECT * FROM can_ho ch  LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho ORDER BY MaCH LIMIT $batdau,8");
}

function product_home_dem()
{
  return pdo_query_value("SELECT COUNT(*) FROM can_ho");
}
function product_home_type_dem($loai)
{
  return pdo_query_value("SELECT COUNT(*) FROM can_ho WHERE MaLoai=$loai");
}
function product_home_type($loai, $page)
{
  $batdau = ($page - 1) * 8;
  return pdo_query("SELECT * FROM can_ho ch  LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho WHERE MaLoai=$loai ORDER BY MaCH LIMIT $batdau,8");
}
function product_m($MaCH)
{
  return pdo_query("SELECT * FROM can_ho WHERE MaCH=?", $MaCH);
}
function product_edit($MaCH, $TenCanHo, $GiaCH, $MoTaCH, $DiaChiCH, $MaKV, $TrangThai, $MaLoai, $DienTich, $SoPhong)
{
  pdo_execute("UPDATE can_ho SET TenCanHo=?, GiaCH=?, MoTaCH=?, DiaChiCH=?, MaKV=?, TrangThai=?, MaLoai =?, DienTich=?, SoPhong=? WHERE MaCH=?", $TenCanHo, $GiaCH, $MoTaCH, $DiaChiCH, $MaKV, $TrangThai, $MaLoai, $DienTich, $SoPhong, $MaCH);
}
function product_check($MaCH)
{
  return pdo_query_one("SELECT * FROM can_ho WHERE MaCH=?", $MaCH);
}
function product_add($TenCanHo, $GiaCH, $MoTaCH, $DiaChiCH, $MaKV, $TrangThai, $MaLoai, $DienTich, $SoPhong)
{
  pdo_execute("INSERT INTO can_ho(`TenCanHo`,`GiaCH`,`MoTaCH`,`DiaChiCH`,`MaKV`,`TrangThai`,`MaLoai`,`DienTich`,`SoPhong`,`LuotXem`) VALUES(?,?,?,?,?,?,?,?,?,0)", $TenCanHo, $GiaCH, $MoTaCH, $DiaChiCH, $MaKV, $TrangThai, $MaLoai, $DienTich, $SoPhong);
}
function image_add($MaCH, $Hinh)
{
  pdo_execute("INSERT INTO `hinh_anh`(`MaCH`, `HinhAnh`) VALUES (?,?)", $MaCH, $Hinh);
}
function ch_check()
{
  return pdo_query_one("SELECT MAX(MaCH) maxch FROM can_ho");
}
function get_CH($MaCH)
{
  return pdo_query_one("SELECT  ch.*, ha.DSHinhAnh  FROM `can_ho` ch  LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho WHERE ch.MaCH=?", $MaCH);
}
function update_image($MaHA, $Hinh, $TT)
{
  pdo_execute("UPDATE `hinh_anh` SET`Hinh" . $TT . "`=? WHERE MaHA = ? ", $Hinh, $MaHA);
}
function delete_can_ho($MaCH)
{
  return pdo_execute("DELETE FROM can_ho WHERE MaCH = $MaCH");
}

function ha_check($MaCH)
{
  return pdo_query("SELECT * FROM `hinh_anh` WHERE MaCH=?", $MaCH);
}
function ha_update($Anh, $MaHA)
{
  return pdo_query("UPDATE `hinh_anh` SET `HinhAnh`= ? WHERE MaHA=?", $Anh, $MaHA);
}
function ha_delete( $MaCH)
{
  return pdo_query("DELETE FROM `hinh_anh` WHERE MaCH=?", $MaCH);
}
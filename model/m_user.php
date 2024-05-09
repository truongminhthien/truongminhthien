<?php
include_once 'm_pdo.php';

function user_getAll($page = 1)
{
  $batdau = ($page - 1) * 5;
  // 1 trang lấy 5 user
  // Trang 1 bắt đầu từ 0
  // Trang 2 bắt đầu từ 5
  // Trang 3 bắt đầu từ 10
  // Trang n bắt đầu từ (n-1)*5
  return pdo_query("SELECT * FROM tai_khoan LIMIT $batdau, 5");
}

function user_getAllTotal()
{
  return pdo_query_value("SELECT COUNT(*) FROM tai_khoan");
}

function user_checkPhone($SoDienThoai)
{
  return pdo_query_one("SELECT * FROM tai_khoan WHERE SoDienThoai=?", $SoDienThoai);
}

function user_add($SoDienThoai, $TenKhachHang, $MatKhau, $Email, $HinhAnh, $Quyen)
{
  pdo_execute("INSERT INTO tai_khoan(`SoDienThoai`,`TenKhachHang`,`MatKhau`,`Email`,`HinhAnh`,`Quyen`) VALUES(?,?,?,?,?,?)", $SoDienThoai, $TenKhachHang, $MatKhau, $Email, $HinhAnh, $Quyen);
}

function user_getByID($MaTK)
{
  return pdo_query_one("SELECT * FROM tai_khoan WHERE MaTK=?", $MaTK);
}

function user_edit($MaTK, $TenKhachHang, $SoDienThoai, $Email, $Quyen, $DiaChiKhachHang)
{
  pdo_execute("UPDATE tai_khoan SET TenKhachHang=?, SoDienThoai=?, Email=?, Quyen=?, DiaChiKhachHang=? WHERE MaTK=?", $TenKhachHang, $SoDienThoai, $Email, $Quyen, $DiaChiKhachHang, $MaTK);
}

function user_delete($MaTK)
{
  pdo_execute("DELETE FROM tai_khoan WHERE MaTK=?", $MaTK);
}

function user_count()
{
  return pdo_query_value("SELECT COUNT(*) FROM tai_khoan WHERE Quyen='0'");
}

function user_recently()
{
  return pdo_query("SELECT * FROM `tai_khoan` ORDER BY MaTK DESC LIMIT 5");
}

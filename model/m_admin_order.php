<?php
include_once 'm_pdo.php';

function get_order($page = 1)
{
  $batdau = ($page - 1) * 5;
  return pdo_query("SELECT tk.*,ch.*,dh.MaDH,dh.MaTK,dh.MaCH,dh.NgayLapDon,dh.NgayNhan,dh.NgayTraDuKien,dh.NgayTra,dh.GiaCHHT,dh.TrangThai AS TrangThaiDH FROM tai_khoan tk INNER JOIN don_hang dh ON tk.MaTK = dh.MaTK INNER JOIN can_ho ch ON dh.MaCH = ch.MaCH ORDER BY NgayLapDon DESC LIMIT $batdau, 5");
}

function order_getAllTotal()
{
  return pdo_query_value("SELECT COUNT(*) FROM don_hang");
}

function order_getByID($MaDH)
{
  return pdo_query_one("SELECT * FROM don_hang WHERE MaDH=?", $MaDH);
}

function order_edit($MaDH, $TrangThai)
{
  if ($TrangThai == '') {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngayHienTai = date("Y-m-d");
    pdo_execute("UPDATE don_hang SET TrangThai=? ,NgayTra=? WHERE MaDH=?", $TrangThai, $ngayHienTai, $MaDH);
  } else {
    pdo_execute("UPDATE don_hang SET TrangThai=? WHERE MaDH=?", $TrangThai, $MaDH);
  }
}

function order_delete($MaDH)
{
  pdo_execute("DELETE FROM don_hang WHERE MaDH=?", $MaDH);
}
// Lấy ra các đơn hàng theo các loại
function get_orderLoai($page, $loai)
{
  $batdau = ($page - 1) * 5;
  return pdo_query("SELECT tk.*,ch.*,dh.MaDH,dh.MaTK,dh.MaCH,dh.NgayLapDon,dh.NgayNhan,dh.NgayTraDuKien,dh.NgayTra,dh.GiaCHHT,dh.TrangThai AS TrangThaiDH FROM tai_khoan tk INNER JOIN don_hang dh ON tk.MaTK = dh.MaTK INNER JOIN can_ho ch ON dh.MaCH = ch.MaCH WHERE dh.TrangThai=? ORDER BY NgayLapDon DESC LIMIT $batdau, 5", $loai);
}
// Lấy ra tất cả các đơn hàng theo loại
function order_getAllTotalLoai($loai)
{
  return pdo_query_value("SELECT COUNT(*) FROM don_hang WHERE TrangThai=?", $loai);
}
// Lấy ra các đơn hàng theo trễ hạn
function get_orderTre($page)
{
  date_default_timezone_set('Asia/Ho_Chi_Minh');

  $ngayHienTai = date("Y-m-d");
  $batdau = ($page - 1) * 5;
  return pdo_query("SELECT tk.*,ch.*,dh.MaDH,dh.MaTK,dh.MaCH,dh.NgayLapDon,dh.NgayNhan,dh.NgayTraDuKien,dh.NgayTra,dh.GiaCHHT,dh.TrangThai AS TrangThaiDH FROM tai_khoan tk INNER JOIN don_hang dh ON tk.MaTK = dh.MaTK INNER JOIN can_ho ch ON dh.MaCH = ch.MaCH WHERE (dh.TrangThai='da_nhan'AND dh.NgayTra<$ngayHienTai) OR (dh.NgayTraDuKien<dh.NgayTra) ORDER BY NgayLapDon DESC LIMIT $batdau, 5");
}

function order_getAllTotalTre()
{
  date_default_timezone_set('Asia/Ho_Chi_Minh');

  $ngayHienTai = date("Y-m-d");
  return pdo_query_value("SELECT COUNT(*) FROM don_hang dh WHERE (dh.TrangThai='da_nhan' AND dh.NgayTra<$ngayHienTai) OR (dh.NgayTraDuKien<dh.NgayTra)");
}
// Lấy ra thông tin người tạo đơn
function order_getByIDuser($MaTK)
{
  return pdo_query_one("SELECT * FROM tai_khoan WHERE MaTK=?", $MaTK);
}

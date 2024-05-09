<?php
include_once 'm_pdo.php';
// lấy loại căn hộ
function loai()
{
  return pdo_query("SELECT * FROM loai");

}
function loai_add($TenLoai)
{
  pdo_execute("INSERT INTO loai (`TenLoai`) VALUES(?)", $TenLoai);
}
function loai_check($MaLoai)
{
  return pdo_query_one("SELECT * FROM loai WHERE MaLoai=?", $MaLoai);
  
}
function loai_edit($MaLoai, $TenLoai)
{
  pdo_execute("UPDATE loai SET TenLoai=?WHERE MaLoai=?", $TenLoai, $MaLoai);
}
function delete_loai($MaLoai)
{
        return pdo_execute("DELETE FROM loai WHERE MaLoai = $MaLoai");
}
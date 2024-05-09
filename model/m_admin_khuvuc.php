<?php
include_once 'm_pdo.php';
// hiển thị khu vực
function khuvuc()
{
  return pdo_query("SELECT * FROM khu_vuc");
  
}
function khuvuc_add($TenKhuVuc)
{
  pdo_execute("INSERT INTO khu_vuc(`TenKV`) VALUES(?)", $TenKhuVuc);
}
function khuvuc_check($MaKV)
{
  return pdo_query_one("SELECT * FROM khu_vuc WHERE MaKV=?", $MaKV);
  
}
function khuvuc_edit($MaKV, $TenKhuVuc)
{
  pdo_execute("UPDATE khu_vuc SET TenKV=?WHERE MaKV=?", $TenKhuVuc, $MaKV);
}
function delete_khuvuc($MaKV)
{
        return pdo_execute("DELETE FROM khu_vuc WHERE MaKV = $MaKV");
}
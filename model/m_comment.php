<?php
include_once 'm_pdo.php';

function cmt_getAll()
{
  return pdo_query("SELECT * FROM `binh_luan` bl INNER JOIN tai_khoan tk ON bl.MaTK=tk.MaTK INNER JOIN can_ho ch ON ch.MaCH=bl.MaCH ORDER BY bl.NgayDang DESC LIMIT 5");
}

function comment_count()
{
    return pdo_query_value("SELECT COUNT(*) FROM binh_luan");
}
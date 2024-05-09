<?php
include_once 'm_pdo.php';
// function tin()
// {
//     return pdo_query("SELECT * FROM tin_tuc ORDER BY MaTT DESC Limit 5");
// }
function tin_luotxem()
{
    return pdo_query("SELECT * FROM tin_tuc WHERE TrangThai <> 0 ORDER BY luotxem DESC Limit 5");
}
function seach_tin($key_tin)
{
    return pdo_query("SELECT * FROM tin_tuc WHERE TieuDe Like '%$key_tin%' AND TrangThai <> 0 ");
}
function tin($page = 1, $itemsPerPage = 6)
{
    $startIndex = ($page - 1) * $itemsPerPage;
    return pdo_query("SELECT * FROM tin_tuc WHERE TrangThai <> 0 ORDER BY MaTT DESC LIMIT $startIndex, $itemsPerPage ");
}

function count_tin_pages($itemsPerPage = 6)
{
    $totalItems = count_tin();
    return ceil($totalItems / $itemsPerPage);
}
function count_tin()
{
    $result = pdo_query("SELECT COUNT(*) as total FROM tin_tuc WHERE TrangThai <> 0");
    return $result[0]['total'];
}
function get_show_tin($MaTT)
{
    return pdo_query_one("SELECT * FROM tin_tuc WHERE MaTT = $MaTT");
}
function update_view_count($MaTT)
{
    pdo_execute("UPDATE tin_tuc SET luotxem = luotxem + 1 WHERE MaTT = $MaTT");
}
function tin_luotthich()
{
    return pdo_query("SELECT * FROM tin_tuc WHERE TrangThai <> 0 ORDER BY luotthich DESC Limit 5");
}

function like_tin($MaTT)
{
    pdo_execute("UPDATE tin_tuc SET luotthich = luotthich + 1 WHERE MaTT = $MaTT ");
    pdo_execute("UPDATE tin_tuc SET luotxem = luotxem - 1 WHERE MaTT = $MaTT");
}
function tin_khac()
{
    return pdo_query("SELECT * FROM tin_tuc WHERE TrangThai <> 0 ORDER BY RAND() LIMIT 4");
}
function can_ho_lienquan($MaKV)
{
    return pdo_query("SELECT * FROM can_ho ch LEFT JOIN (SELECT ch.MaCH canho, GROUP_CONCAT(ha.HinhAnh SEPARATOR '||') AS DSHinhAnh FROM can_ho ch LEFT JOIN hinh_anh ha ON ch.MaCH = ha.MaCH GROUP BY ch.MaCH, ch.TenCanHo) ha ON ch.MaCH=ha.canho WHERE ch.MaKV = $MaKV ORDER BY RAND() LIMIT 5");
}

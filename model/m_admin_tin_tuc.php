<?php
include 'm_pdo.php';
function show_tin_tuc($page)
{ $itemsPerPage = 5;
    $startIndex = ($page - 1) * $itemsPerPage;
    return pdo_query("SELECT * FROM tin_tuc ORDER BY MaTT DESC LIMIT $startIndex, $itemsPerPage");
}

function count_tin_pages($itemsPerPage = 5)
{
    $totalItems = count_tin();
    return ceil($totalItems / $itemsPerPage);
}
function count_tin()
{
    $result = pdo_query("SELECT COUNT(*) as total FROM tin_tuc");
    return $result[0]['total'];
}

function delete_tin_tuc($MaTT)
{
        return pdo_execute("DELETE FROM tin_tuc WHERE MaTT = $MaTT");
}
function add_tin_tuc($TieuDe, $MoTa, $MaKV, $NoiDung, $HinhAnh, $TrangThai)
{
    return pdo_execute(
        "INSERT INTO tin_tuc(TieuDe, MoTa, MaKV, NoiDung, HinhAnh, TrangThai) 
        VALUES (?, ?, ?, ?, ?, ?)",
        $TieuDe, $MoTa, $MaKV, $NoiDung, $HinhAnh, $TrangThai
    );
}
function get_tin_tuc_by_id($MaTT)
{
    return pdo_query_one("SELECT * FROM tin_tuc WHERE MaTT = $MaTT");
}

function edit_tin_tuc($MaTT, $TieuDe, $MoTa, $MaKV, $HinhAnh, $TrangThai , $NoiDung)
{
    return pdo_execute(
        "UPDATE tin_tuc SET TieuDe=?, MoTa=?, MaKV=?, HinhAnh=?, Trangthai=?, NoiDung=? WHERE MaTT=?",
        $TieuDe, $MoTa, $MaKV, $HinhAnh, $TrangThai, $NoiDung,  $MaTT
    );
}
function an_tin($MaTT)
{
    pdo_execute("UPDATE tin_tuc SET TrangThai = 0 WHERE MaTT = $MaTT ");
}
function hien_tin($MaTT)
{
    pdo_execute("UPDATE tin_tuc SET TrangThai = 1 WHERE MaTT = $MaTT ");
}






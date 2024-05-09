<?php
include_once 'm_pdo.php';
//Đăng nhập
function Login($SoDienThoai, $MatKhau)
{
    return pdo_query_one("SELECT * FROM tai_khoan WHERE SoDienThoai=? AND MatKhau=? AND KichHoat = '1'", $SoDienThoai, $MatKhau);
}
function kiemtraemail($Email, $SoDienThoai)
{
    $result = pdo_query_one("SELECT SoDienThoai FROM tai_khoan WHERE SoDienThoai=?", $SoDienThoai);
    if ($result) {
        return $result;
    } else {
        $result = pdo_query_one("SELECT Email FROM tai_khoan WHERE Email=?", $Email);
        return $result;
    }
    return null;
}

//Đăng ký

function Register($HoTen, $SoDienThoai, $Email, $DiaChi, $MatKhau, $HinhAnh, $Quyen)
{

    $key = 'admin';
    $hashedPassword = hash_hmac('sha3-256', $MatKhau, $key);

    pdo_execute(
        "INSERT INTO tai_khoan (`TenKhachHang`, `SoDienThoai`, `Email`, `DiaChiKhachHang`, `MatKhau`, `HinhAnh`, `Quyen`,`KichHoat`) VALUES (?, ?, ?, ?, ?, ?, ?, 0);",
        $HoTen,
        $SoDienThoai,
        $Email,
        $DiaChi,
        $hashedPassword,
        $HinhAnh,
        $Quyen
    );
    return true;
}

function ForGotPass($Email)
{
    return pdo_query("SELECT * FROM `tai_khoan` WHERE Email LIKE ?", $Email);
}

function UpDateUsr($MaTK, $HinhAnh, $HoTen, $Email, $SoDienThoai, $MatKhau, $DiaChi)
{
    $key = 'admin';
    $hashedPassword = hash_hmac('sha3-256', $MatKhau, $key);
    if ($HinhAnh != null && $MaTK != null) {
        return pdo_execute("UPDATE `tai_khoan` SET `TenKhachHang`=?,`MatKhau`=?,`SoDienThoai`=?,`Email`=?,`HinhAnh`=?,`DiaChiKhachHang`=? WHERE `MaTK`=?", $HoTen, $hashedPassword, $SoDienThoai, $Email, $HinhAnh, $DiaChi, $MaTK);
    } else if ($MaTK != null && $HinhAnh == null) {
        return pdo_execute("UPDATE `tai_khoan` SET `TenKhachHang`=?,`MatKhau`=?,`SoDienThoai`=?,`Email`=?,`DiaChiKhachHang`=? WHERE `MaTK`=?", $HoTen, $hashedPassword, $SoDienThoai, $Email, $DiaChi, $MaTK);
    } else if ($MaTK == null && $HinhAnh != null) {
        return pdo_execute("UPDATE `tai_khoan` SET `TenKhachHang`=?,`SoDienThoai`=?,`Email`=?,`DiaChiKhachHang`=?,`HinhAnh`=? WHERE `MaTK`=?", $HoTen, $SoDienThoai, $Email, $DiaChi, $HinhAnh, $MaTK);
    } else {
        return pdo_execute("UPDATE `tai_khoan` SET `TenKhachHang`=?,`SoDienThoai`=?,`Email`=?,`DiaChiKhachHang`=? WHERE `MaTK`=?", $HoTen, $SoDienThoai, $Email, $DiaChi, $MaTK);
    }
}

function Setpass($hashedPassword, $Email)
{
    $key = 'admin';
    $hashedPassword = hash_hmac('sha3-256', $hashedPassword, $key);
    pdo_execute("UPDATE `tai_khoan` SET `MatKhau`=? WHERE Email = ?", $hashedPassword, $Email);
    return true;
}
function kichhoattaikhoan($Email)
{
    pdo_execute("UPDATE `tai_khoan` SET `KichHoat` = '1' WHERE Email = ?", $Email);
    return true;
}

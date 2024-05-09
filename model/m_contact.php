<?php

include_once 'm_pdo.php';

function guilienhe($tennguoilienhe, $email, $tieude, $noidung)
{
    $sql = "INSERT INTO `lien_he`(`TenNguoiLienHe`, `Email`, `TieuDe`, `NoiDung`)
    VALUES (?,?,?,?)";
    pdo_execute($sql, $tennguoilienhe, $email, $tieude, $noidung);
    return true;
}

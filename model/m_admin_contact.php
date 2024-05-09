<?php
include_once "m_pdo.php";
function Get_Contact(){
return pdo_query("SELECT * FROM lien_he");
}
function Delete_Contact($MaLH)
{
  pdo_execute("DELETE FROM lien_he WHERE MaLH = ?", $MaLH);
}


?>
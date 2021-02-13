<?php
include("../conexion.php");

$red = $_POST['social'];
$url = $_POST['url'];

if (empty($url)) {
    $url = "#";
}

// Consulta segura para evitar inyecciones SQL.

$sql = "UPDATE tab_social
SET   Url_social  = '".$url."'
WHERE red_social  = '".$red."';";

mysqli_query($con, $sql);
mysqli_close($con);

echo $url;

?>

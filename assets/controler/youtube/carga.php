<?php
include("../conexion.php");

$video = $_POST['video'];
$url = $_POST['url'];

if (empty($url)) {
    $url = "#";
}

// Consulta segura para evitar inyecciones SQL.

$sql = "UPDATE tab_youtube
SET   Url  = '".$url."'
WHERE posicion  = ".$video.";";

mysqli_query($con, $sql);
mysqli_close($con);

echo $url;

?>
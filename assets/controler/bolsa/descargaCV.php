<?php
include("../conexion.php");
session_start();

$id = $_GET['cv'];

$queryVacante = "SELECT cv FROM tab_candidatos WHERE Id =" . $id;
$rsVacante = mysqli_query($con, $queryVacante) or die(mysqli_error($con));
$Vacante = mysqli_fetch_array($rsVacante);

$_SESSION['file'] = $Vacante['cv'];
$fileName = basename($Vacante['cv']);
$filePath = '../../doc/' . $fileName;
if (!empty($fileName) && file_exists($filePath)) {
    // Define headers
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$fileName");
    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile($filePath);
} else {
    echo 0;
}

mysqli_close($con);

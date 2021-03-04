<?php
include("../conexion.php");

$cv = $_POST['cv'];


$sql = "UPDATE tab_candidatos
SET tab_candidatos.status='Archivado'
WHERE Id=" . $cv;

if (mysqli_query($con, $sql)) {
    echo 0;
} else {
    echo 1;
}

mysqli_close($con);

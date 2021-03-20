<?php
include("../conexion.php");

$vacante = $_POST['Vacante'];

// Consulta segura para evitar inyecciones SQL.

$sql = "INSERT INTO tab_vacantes VALUES(NULL, '$vacante', '','','','true')";
if (mysqli_query($con, $sql)) {
    echo 0;
}else {
    echo mysqli_error($con);
}
 
mysqli_close($con);

?>

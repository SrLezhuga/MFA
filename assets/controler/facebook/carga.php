<?php
include("../conexion.php");

$Suc= $_POST['Suc'];
$Url= $_POST['Url'];

if (empty($Url)) {
    echo "Url vacías";
}else {
    
    // Consulta segura para evitar inyecciones SQL.

    $sql = "UPDATE tab_facebook
    SET     Url     = '".$Url."'
    WHERE Sucursal  = '".$Suc."';";

    if (mysqli_query($con, $sql)) {
        echo 0;
    }else {
        echo mysqli_error($con);
    }

    mysqli_close($con);

}
?>
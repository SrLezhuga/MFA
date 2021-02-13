<?php
include("../conexion.php");

$Suc= $_POST['Suc'];
$Dir= $_POST['Dir'];
$Col= $_POST['Col'];
$Cp= $_POST['Cp'];
$Mun= $_POST['Mun'];
$Cor= $_POST['Cor'];
$Tel= $_POST['Tel'];
$Ho1= $_POST['Ho1'];
$Ho2= $_POST['Ho2'];
$Mpg= $_POST['Mpg'];
$Mpc= $_POST['Mpc'];

if (empty($Dir) | empty($Col) | empty($Cp) | empty($Mun) | empty($Cor) |
    empty($Tel) | empty($Ho1) | empty($Ho2) | empty($Mpg) | empty($Mpc)) {
    echo "Uno o más campos vacíos";
}else {
    
    // Consulta segura para evitar inyecciones SQL.

    $sql = "UPDATE tab_sucursal
    SET     direccion       = '".$Dir."',
            colonia         = '".$Col."',
            codigo_postal   = '".$Cp."',
            municipio       = '".$Mun."',
            correo          = '".$Cor."',
            telefono        = '".$Tel."',
            horario_1       = '".$Ho1."',
            horario_2       = '".$Ho2."',
            mapa            = '".$Mpg."',
            mapa_cel        = '".$Mpc."'
    WHERE nombre_sucursal   = '".$Suc."';";

    if (mysqli_query($con, $sql)) {
        echo 0;
    }else {
        echo mysqli_error($con);
    }

    mysqli_close($con);

}
?>
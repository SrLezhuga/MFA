<?php
include("../conexion.php");

$Rec= $_POST['reclutador'];
$Tel= $_POST['telefono'];
$Cor= $_POST['correo'];
$Fb= $_POST['fb'];
$Wp= $_POST['wp'];

if (empty($Rec) | empty($Tel) | empty($Cor)) {
    echo "Uno o más campos vacíos";
}else {
    
    $sql = "UPDATE tab_rrhh
    SET     nombre      = '".$Rec."',
            correo      = '".$Cor."',
            telefono    = '".$Tel."',
            fb          = '".$Fb."',
            wp_txt      = '".$Wp."'
    WHERE nombre        = '".$Rec."';";

    if (mysqli_query($con, $sql)) {
        echo 0;
    }else {
        echo mysqli_error($con);
    }

    mysqli_close($con);

}
?>
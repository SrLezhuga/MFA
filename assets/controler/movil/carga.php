<?php
include("../conexion.php");
$data = array();

if (!empty($_POST['sus_nombre']) || !empty($_POST['sus_correo']) || !empty($_POST['sus_telefono'])) {
    $sus_nombre = $_POST['sus_nombre'];
    $sus_correo = $_POST['sus_correo'];
    $sus_telefono = $_POST['sus_telefono'];

    $querySuscripcion = "SELECT count(*) AS contador FROM tab_suscripcion WHERE Correo = '" . $sus_correo . "' OR Telefono = '" . $sus_telefono . "'";
    $rsSuscripcion = mysqli_query($con, $querySuscripcion) or die(mysqli_error($con));
    $Suscripcion = mysqli_fetch_array($rsSuscripcion);

    if ($Suscripcion['contador'] == 0) {
        $sql = "INSERT INTO tab_suscripcion VALUES(null,'$sus_nombre','$sus_correo','$sus_telefono')";
        if (mysqli_query($con, $sql)) {
            $data['status'] = 'ok';
            $data['msg'] = 'Suscripción realizada.';
        } else {
            $data['status'] = 'error';
            $data['msg'] = 'Error al suscribirte!';
        }
    } else {
        $data['status'] = 'error';
        $data['msg'] = 'Error al suscribirte, tu número o correo ya esta suscrito!';
    }
} else {
    $data['status'] = 'error';
    $data['msg'] = 'Error al suscribirte';
}

echo json_encode($data);
mysqli_close($con);

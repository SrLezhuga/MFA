<?php

include("../conexion.php");
$reclutador = $_POST['Rec'];

$queryRec = "SELECT * FROM tab_rrhh WHERE nombre = '" . $reclutador . "'";
$rsRec = mysqli_query($con, $queryRec) or die("Error de consulta");
$Rec = mysqli_fetch_array($rsRec);



$data = array();
$data['status']     = 'ok';
$data['Nombre']     = $Rec['nombre'];
$data['Correo']     = $Rec['correo'];
$data['Telefono']   = $Rec['telefono'];
$data['Fb']         = $Rec['fb'];
$data['Wp']         = $Rec['wp_txt'];

//returns data as JSON format
echo json_encode($data);

<?php
include("../conexion.php");

$id = $_POST['vacante'];

$queryBolsa = "SELECT * FROM tab_vacantes WHERE Id =" . $id;
$rsBolsa = mysqli_query($con, $queryBolsa) or die(mysqli_error($con));
$Bolsa = mysqli_fetch_array($rsBolsa);

$data = array();
$data['status'] = 'ok';
$data['Id'] = $Bolsa['Id'];
$data['vacante'] = $Bolsa['vacante'];
$data['requisitos'] = $Bolsa['requisitos'];
$data['ofrecemos'] = $Bolsa['ofrecemos'];
$data['img'] = $Bolsa['img'];

//returns data as JSON format
echo json_encode($data);

mysqli_close($con);

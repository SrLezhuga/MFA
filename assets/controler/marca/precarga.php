<?php
include("../conexion.php");
$marca = $_POST["Mar"];

$queryMar = "SELECT * FROM tab_marca WHERE Nombre = '" . $marca . "'";
$rsMar = mysqli_query($con, $queryMar) or die(mysqli_error($con));
$Mar = mysqli_fetch_array($rsMar);



$data = array();
$data['status']     = 'ok';
$data['Nombre']     = $marca;
$data['Img']        = $Mar['Img_url'];
$data['Link']    = $Mar['Link'];

//returns data as JSON format
echo json_encode($data);

mysqli_close($con);

<?php
include("../conexion.php");

$id = $_POST['sucursal'];
$Fachada = str_replace("Tienda ", "", $id);

$querySucursal = "SELECT * FROM tab_sucursal WHERE nombre_sucursal ='" . $id . "'";
$rsSucursal = mysqli_query($con, $querySucursal) or die(mysqli_error($con));
$Sucursal = mysqli_fetch_array($rsSucursal);

$queryImgSuc = "SELECT Img_sucursal FROM tab_web WHERE Sucursal ='" . $Fachada . "'";
$rsImgSuc = mysqli_query($con, $queryImgSuc) or die(mysqli_error($con));
$ImgSuc = mysqli_fetch_array($rsImgSuc);

$data = array();
$data['status'] = 'ok';
$data['nombre_sucursal'] = $Sucursal['nombre_sucursal'];
$data['direccion'] = $Sucursal['direccion'];
$data['colonia'] = $Sucursal['colonia'];
$data['codigo_postal'] = $Sucursal['codigo_postal'];
$data['municipio'] = $Sucursal['municipio'];
$data['correo'] = $Sucursal['correo'];
$data['telefono'] = str_replace(" ", "", $Sucursal['telefono']);
$data['mapa'] = $Sucursal['mapa'];
$data['mapa_cel'] = $Sucursal['mapa_cel'];
$data['img'] = $ImgSuc['Img_sucursal'];
$data['sucursal'] = $Fachada;

//returns data as JSON format
echo json_encode($data);

mysqli_close($con);

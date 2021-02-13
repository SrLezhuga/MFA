<?php
include("../conexion.php");
    $sucursal = $_POST["Suc"];

    $querySucursal = "SELECT * FROM tab_sucursal WHERE nombre_sucursal = '".$sucursal."'";
    $rsSucursal = mysqli_query($con, $querySucursal) or die("Error de consulta");
    $Sucursal = mysqli_fetch_array($rsSucursal);



        $data = array();
        $data['status'] = 'ok';
        $data['direccion'] = $Sucursal['direccion'];
        $data['colonia'] = $Sucursal['colonia'];
        $data['codigo_postal'] = $Sucursal['codigo_postal'];
        $data['municipio'] = $Sucursal['municipio'];
        $data['correo'] = $Sucursal['correo'];
        $data['telefono'] = $Sucursal['telefono'];
        $data['horario_1'] = $Sucursal['horario_1'];
        $data['horario_2'] = $Sucursal['horario_2'];
        $data['mapa'] = $Sucursal['mapa'];
        $data['mapa_cel'] = $Sucursal['mapa_cel'];

    
    //returns data as JSON format
    echo json_encode($data);
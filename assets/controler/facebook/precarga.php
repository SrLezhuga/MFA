<?php
include("../conexion.php");
    $sucursal = $_POST["Suc"];

    $querySucursal = "SELECT * FROM tab_facebook WHERE Sucursal = '".$sucursal."'";
    $rsSucursal = mysqli_query($con, $querySucursal) or die("Error de consulta");
    $Sucursal = mysqli_fetch_array($rsSucursal);



        $data = array();
        $data['status'] = 'ok';
        $data['Url'] = $Sucursal['Url'];

    
    //returns data as JSON format
    echo json_encode($data);
<?php
include("../conexion.php");
    $sucursal = $_POST["Suc"];

    $querySucursal = "SELECT * FROM tab_web WHERE Sucursal = '".$sucursal."'";
    $rsSucursal = mysqli_query($con, $querySucursal) or die("Error de consulta");
    $Sucursal = mysqli_fetch_array($rsSucursal);



        $data = array();
        $data['status']         = 'ok';
        $data['Img_logo']       = $Sucursal['Img_logo'];
        $data['Titulo']         = $Sucursal['Titulo'];
        $data['Sub_titulo']     = $Sucursal['Sub_titulo'];
        $data['Slogan']         = $Sucursal['Slogan'];
        $data['Sub_slogan']     = $Sucursal['Sub_slogan'];
        $data['Img_sucursal']   = $Sucursal['Img_sucursal'];
        $data['Mfa_texto']      = $Sucursal['Mfa_texto'];

    
    //returns data as JSON format
    echo json_encode($data);
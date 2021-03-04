<?php
include("../conexion.php");
$Id = $_POST["promocion"];

    $queryPromocion = "SELECT * FROM tab_modal_promocion WHERE Id_promocion = ".$Id."";
    $rsPromocion = mysqli_query($con, $queryPromocion) or die(mysqli_error($con));
    $Promocion = mysqli_fetch_array($rsPromocion);



        $data = array();
        $data['status']        = 'ok';
        $data['Imagen_url']    = $Promocion['Imagen_url'];
        $data['Url']           = $Promocion['Url'];
        $data['visible']     = $Promocion['Status'];

    
    //returns data as JSON format
    echo json_encode($data);

    
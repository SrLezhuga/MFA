<?php
include("../conexion.php");
$Id = $_POST["vacante"];

    $queryVacante = "SELECT * FROM tab_vacantes WHERE Id = ".$Id."";
    $rsVacante = mysqli_query($con, $queryVacante) or die(mysqli_error($con));
    $Vacante = mysqli_fetch_array($rsVacante);



        $data = array();
        $data['status']        = 'ok';
        $data['requisitos']    = $Vacante['requisitos'];
        $data['img']           = $Vacante['img'];
        $data['ofrecemos']     = $Vacante['ofrecemos'];
        $data['visible']       = $Vacante['visible'];
    
    //returns data as JSON format
    echo json_encode($data);

    
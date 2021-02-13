<?php
include("../conexion.php");
$Id = $_POST["vacante"];

    $queryVacante = "SELECT * FROM tab_vacantes WHERE Id = ".$Id."";
    $rsVacante = mysqli_query($con, $queryVacante) or die(mysqli_error($con));
    $Vacante = mysqli_fetch_array($rsVacante);



        $data = array();
        $data['status']         = 'ok';
        $data['descripcion']    = $Vacante['descripcion'];
        $data['img']            = $Vacante['img'];
        $data['r_sexo']         = $Vacante['r_sexo'];
        $data['r_edad']         = $Vacante['r_edad'];
        $data['r_escolaridad']  = $Vacante['r_escolaridad'];
        $data['r_experiencia']  = $Vacante['r_experiencia'];
        $data['o_sueldo']       = $Vacante['o_sueldo'];
        $data['o_beneficios']   = $Vacante['o_beneficios'];
        $data['o_horario']      = $Vacante['o_horario'];
        $data['o_lugar']        = $Vacante['o_lugar'];
        $data['observaciones']  = $Vacante['observaciones'];

    
    //returns data as JSON format
    echo json_encode($data);

    
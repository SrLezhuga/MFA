<?php
include("../conexion.php");
    $id_cupon = $_POST["id_cupon"];

$query = "SELECT * FROM movil_cupon WHERE id_cupon =".$id_cupon;
$rs = mysqli_query($con, $query) or die(mysqli_error($con));
$item = mysqli_fetch_array($rs);
        $data = array();
        $data['status'] = 'ok';
        $data['id_cupon'] = $item['id_cupon'];
        $data['codigo'] = $item['codigo'];
        $data['creditos'] = $item['creditos'];
        $data['concepto'] = $item['concepto'];
        $data['valor'] = $item['valor'];
        $data['base1'] = $item['base1'];
        $data['base2'] = $item['base2'];
        $data['base3'] = $item['base3'];
        $data['vigencia'] = $item['vigencia'];
        
    //returns data as JSON format
    echo json_encode($data);

mysqli_close($con);

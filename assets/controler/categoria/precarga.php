<?php
include("../conexion.php");
    $categoria = $_POST["Cat"];

    $queryCat = "SELECT * FROM tab_categoria WHERE Id = ".$categoria;
    $rsCat = mysqli_query($con, $queryCat) or die("Error de consulta");
    $Cat = mysqli_fetch_array($rsCat);



        $data = array();
        $data['status'] = 'ok';
        $data['Id'] = $categoria;
        $data['Img'] = $Cat['Img'];
        $data['Url_img'] = $Cat['Href'];
        $data['Desc'] = $Cat['Desc'];
        $data['Sucursal'] = $Cat['Sucursal'];
    
    //returns data as JSON format
    echo json_encode($data);

    mysqli_close($con);
<?php
include("../conexion.php");
    $categoria = $_POST["Cat"];

    $queryCat = "SELECT * FROM tab_catalogo WHERE Id = ".$categoria;
    $rsCat = mysqli_query($con, $queryCat) or die(mysqli_error($con));
    $Cat = mysqli_fetch_array($rsCat);



        $data = array();
        $data['status'] = 'ok';
        $data['Id'] = $categoria;
        $data['Img'] = $Cat['img'];
        $data['Url_img'] = $Cat['href'];
        $data['Desc'] = $Cat['desc'];
        $data['Sucursal'] = $Cat['Sucursal'];
    
    //returns data as JSON format
    echo json_encode($data);

    mysqli_close($con);
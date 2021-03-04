<?php
include("../conexion.php");
    $galeria = $_POST["Gal"];

    $queryGaleria = "SELECT * FROM tab_galeria WHERE Sucursal = '".$galeria."'";
    $rsGaleria = mysqli_query($con, $queryGaleria) or die("Error de consulta");
    $Galeria = mysqli_fetch_array($rsGaleria);



        $data = array();
        $data['status'] = 'ok';
        $data['ImgUno'] = $Galeria['Img0'];
        $data['ImgDos'] = $Galeria['Img1'];
        $data['ImgTres'] = $Galeria['Img2'];
        $data['ImgCuatro'] = $Galeria['Img3'];
        $data['ImgCinco'] = $Galeria['Img4'];
        $data['ImgSeis'] = $Galeria['Img5'];
        $data['ImgSiete'] = $Galeria['Img6'];
        $data['ImgOcho'] = $Galeria['Img7'];

    
    //returns data as JSON format
    echo json_encode($data);

    mysqli_close($con);
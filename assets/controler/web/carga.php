<?php
include("../conexion.php");

$val = 0;

$sucursal = $_POST["sucursal"];
$titulo_web = $_POST["titulo_web"];
$sub_titulo_web = $_POST["sub_titulo_web"];
$slogan_web = $_POST["slogan_web"];
$sub_slogan = $_POST["sub_slogan"];
$texto_web = $_POST["texto_web"];

$queryWeb = "SELECT Img_logo, Img_sucursal FROM tab_web WHERE Sucursal = '" . $sucursal . "'";
$rsWeb = mysqli_query($con, $queryWeb) or die("Error de consulta");
$Web = mysqli_fetch_array($rsWeb);

if (!empty($_FILES['img_logo']['name'])) {

    $img_logo = $_FILES['img_logo']['name'];

    if (($_FILES["img_logo"]["type"] == "image/pjpeg")
        || ($_FILES["img_logo"]["type"] == "image/jpeg")
        || ($_FILES["img_logo"]["type"] == "image/png")
        || ($_FILES["img_logo"]["type"] == "image/webp")
    ) {
        if (file_exists("../../img/" . $sucursal . "/" . $_FILES['img_logo']['name'])) {
            unlink("../../img/" . $sucursal . "/" . $img_logo);
            move_uploaded_file($_FILES["img_logo"]["tmp_name"], "../../img/" . $sucursal . "/" . $_FILES['img_logo']['name']);
        } else {
            move_uploaded_file($_FILES["img_logo"]["tmp_name"], "../../img/" . $sucursal . "/" . $_FILES['img_logo']['name']);
        }
    } else {
        $val = 1;
    }
} else {
    $img_logo = $Web['Img_logo'];
}

if (!empty($_FILES['img_suc']['name'])) {

    $img_suc = $_FILES['img_suc']['name'];

    if (($_FILES["img_suc"]["type"] == "image/pjpeg")
        || ($_FILES["img_suc"]["type"] == "image/jpeg")
        || ($_FILES["img_suc"]["type"] == "image/png")
        || ($_FILES["img_suc"]["type"] == "image/webp")
    ) {
        if (file_exists("../../img/" . $sucursal . "/" . $_FILES['img_suc']['name'])) {
            unlink("../../img/" . $sucursal . "/" . $img_suc);
            move_uploaded_file($_FILES["img_suc"]["tmp_name"], "../../img/" . $sucursal . "/" . $_FILES['img_suc']['name']);
        } else {
            move_uploaded_file($_FILES["img_suc"]["tmp_name"], "../../img/" . $sucursal . "/" . $_FILES['img_suc']['name']);
        }
    } else {
        $val = 1;
    }
} else {
    $img_suc = $Web['Img_sucursal'];
}

if ($val == 0) {
    $sql = "UPDATE tab_web
                    SET Img_logo ='" . $img_logo . "', 
                    Titulo ='" . $titulo_web . "', 
                    Sub_titulo ='" . $sub_titulo_web . "', 
                    Slogan ='" . $slogan_web . "', 
                    Sub_slogan ='" . $sub_slogan . "', 
                    Mfa_texto ='" . $texto_web . "', 
                    Img_sucursal ='" . $img_suc . "' 
                    WHERE Sucursal ='" . $sucursal . "'";

    if (mysqli_query($con, $sql)) {
        echo 0;
    } else {
        echo 1;
    }
} else {
    echo 1;
}
mysqli_close($con);

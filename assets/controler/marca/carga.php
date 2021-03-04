<?php
include("../conexion.php");

$titulo = $_POST["titulo"];
$link = $_POST["link"];
$nombre = $_POST["nombre"];

if (!empty($_FILES['imgMarca']['name'])) {
    $img = $_FILES['imgMarca']['name'];

    if (($_FILES["imgMarca"]["type"] == "image/jpg")
        || ($_FILES["imgMarca"]["type"] == "image/jpeg")
        || ($_FILES["imgMarca"]["type"] == "image/png")
        || ($_FILES["imgMarca"]["type"] == "image/gif")
    ) {
        move_uploaded_file($_FILES["imgMarca"]["tmp_name"], "../../img/marcas/" . $_FILES['imgMarca']['name']);

        $sql = "UPDATE tab_marca
                    SET Img_url     ='" . $img . "',
                        Nombre      ='" . $titulo . "',
                        Link        ='" . $link . "'
                    WHERE Nombre    ='" . $nombre . "'";

        if (mysqli_query($con, $sql)) {

            mysqli_close($con);
            echo 0;
        } else {
            echo 3;
        }
    } else {
        echo 2;
    }
} else {
    $sql = "UPDATE tab_marca
                    SET Nombre      ='" . $titulo . "',
                    Link            ='" . $link . "'
                    WHERE Nombre    ='" . $nombre . "'";

    if (mysqli_query($con, $sql)) {

        mysqli_close($con);
        echo 0;
    } else {
        echo 1;
    }
}

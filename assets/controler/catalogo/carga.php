<?php
include("../conexion.php");

$titulo = $_POST["titulo"];
$link = $_POST["link"];
$id = $_POST["id"];

if (!empty($_FILES['imgCatalogo']['name'])) {
    $img = $_FILES['imgCatalogo']['name'];

    if (($_FILES["imgCatalogo"]["type"] == "image/jpg")
        || ($_FILES["imgCatalogo"]["type"] == "image/jpeg")
        || ($_FILES["imgCatalogo"]["type"] == "image/png")
        || ($_FILES["imgCatalogo"]["type"] == "image/gif")
    ) {
        move_uploaded_file($_FILES["imgCatalogo"]["tmp_name"], "../../img/catalogos/" . $_FILES['imgCatalogo']['name']);

        $sql = "UPDATE tab_catalogo
                    SET img='" . $img . "',
                        href='" . $link . "',
                        tab_catalogo.desc='" . $titulo . "'
                    WHERE Id=" . $id;

        if (mysqli_query($con, $sql)) {

            mysqli_close($con);
            echo 0;
        }else {
            echo 3;
        }
    } else {
        echo 2;
    }
} else {
    $sql = "UPDATE tab_catalogo
                    SET href='" . $link . "',
                    tab_catalogo.desc='" . $titulo . "'
                    WHERE Id=" . $id;

        if (mysqli_query($con, $sql)) {

            mysqli_close($con);
            echo 0;
        }else {
            echo 1;
        }
}

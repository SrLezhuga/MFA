<?php
include("../conexion.php");

$titulo = $_POST["titulo"];
$link = $_POST["link"];
$id = $_POST["id"];

if (!empty($_FILES['imgCategoria']['name'])) {
    $img = $_FILES['imgCategoria']['name'];

    if (($_FILES["imgCategoria"]["type"] == "image/jpg")
        || ($_FILES["imgCategoria"]["type"] == "image/jpeg")
        || ($_FILES["imgCategoria"]["type"] == "image/png")
        || ($_FILES["imgCategoria"]["type"] == "image/gif")
    ) {
        move_uploaded_file($_FILES["imgCategoria"]["tmp_name"], "../../img/categorias/" . $_FILES['imgCategoria']['name']);

        $sql = "UPDATE tab_categoria
                    SET Img='" . $img . "',
                        Href='" . $link . "',
                        tab_categoria.Desc='" . $titulo . "'
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
    $sql = "UPDATE tab_categoria
                    SET Href='" . $link . "',
                    tab_categoria.Desc='" . $titulo . "'
                    WHERE Id=" . $id;

        if (mysqli_query($con, $sql)) {

            mysqli_close($con);
            echo 0;
        }else {
            echo 1;
        }
}

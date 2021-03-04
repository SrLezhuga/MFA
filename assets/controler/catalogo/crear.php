<?php
include("../conexion.php");

if (!empty($_FILES['imgCatalogo']['name'])) {
   $img = $_FILES['imgCatalogo']['name'];
   $titulo = $_POST["titulo"];
   $link = $_POST["link"];
   $sucursal = $_POST["sucursal"];

     if (($_FILES["imgCatalogo"]["type"] == "image/jpg")
        || ($_FILES["imgCatalogo"]["type"] == "image/jpeg")
        || ($_FILES["imgCatalogo"]["type"] == "image/png")
        || ($_FILES["imgCatalogo"]["type"] == "image/gif")
    ) {
        move_uploaded_file($_FILES["imgCatalogo"]["tmp_name"], "../../img/catalogos/" . $_FILES['imgCatalogo']['name']);

        $sql = "INSERT INTO tab_catalogo VALUES(
            '', '$sucursal', '$link', '$img', '$titulo'
        )";

        if (mysqli_query($con, $sql)) {

            mysqli_close($con);
            echo 0;
        }else {
            echo "Vuelve a intentarlo";
        }
    } else {
        echo "Solo se permiten imagenes .jpg, .jpeg, .png y .webp";
    }
} else {
    echo "No se cargo imagen";
}

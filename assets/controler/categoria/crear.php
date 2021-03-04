<?php
include("../conexion.php");

if (!empty($_FILES['imgCategoria']['name'])) {
   $img = $_FILES['imgCategoria']['name'];
   $titulo = $_POST["titulo"];
   $link = $_POST["link"];
   $sucursal = $_POST["sucursal"];

     if (($_FILES["imgCategoria"]["type"] == "image/jpg")
        || ($_FILES["imgCategoria"]["type"] == "image/jpeg")
        || ($_FILES["imgCategoria"]["type"] == "image/png")
        || ($_FILES["imgCategoria"]["type"] == "image/gif")
    ) {
        move_uploaded_file($_FILES["imgCategoria"]["tmp_name"], "../../img/categorias/" . $_FILES['imgCategoria']['name']);

        $sql = "INSERT INTO tab_categoria VALUES(
            '', '$sucursal', '$img', '$link', '$titulo'
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

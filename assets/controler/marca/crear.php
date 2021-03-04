<?php
include("../conexion.php");

if (!empty($_FILES['imgMarca']['name'])) {
   $img = $_FILES['imgMarca']['name'];
   $titulo = $_POST["titulo"];
   $link = $_POST["link"];

     if (($_FILES["imgMarca"]["type"] == "image/jpg")
        || ($_FILES["imgMarca"]["type"] == "image/jpeg")
        || ($_FILES["imgMarca"]["type"] == "image/png")
        || ($_FILES["imgMarca"]["type"] == "image/gif")
    ) {
        move_uploaded_file($_FILES["imgMarca"]["tmp_name"], "../../img/marcas/" . $_FILES['imgMarca']['name']);

        $sql = "INSERT INTO tab_marca VALUES('$titulo', '$img', '$link')";

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

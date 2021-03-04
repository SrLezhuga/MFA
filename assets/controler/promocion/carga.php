<?php
include("../conexion.php");

$promocion = $_POST['promocion'];
$link = $_POST['link'];
$visible = $_POST['visible'];

$queryPromocion = "SELECT Imagen_url FROM tab_modal_promocion WHERE Id_promocion = " . $promocion . "";
$rsPromocion = mysqli_query($con, $queryPromocion) or die(mysqli_error($con));
$Promocion = mysqli_fetch_array($rsPromocion);

if (!empty($_FILES['imgPromocion']['name'])) {
    if (($_FILES["imgPromocion"]["type"] == "image/pjpeg")
        || ($_FILES["imgPromocion"]["type"] == "image/jpeg")
        || ($_FILES["imgPromocion"]["type"] == "image/png")
        || ($_FILES["imgPromocion"]["type"] == "image/webp")
    ) {
        $imgPromocion = $_FILES['imgPromocion']['name'];
        if ($Promocion['Imagen_url'] == $imgPromocion) {

            $sql = "UPDATE tab_modal_promocion
                SET Url     ='" . $link . "', 
                    Status  ='" . $visible . "'
            WHERE Id_promocion =" . $promocion . "";

            if (mysqli_query($con, $sql)) {
                echo 0;
            } else {
                echo 1;
            }
        } else {
            if (file_exists("../../img/promocion/" . $Promocion['Imagen_url'])) {
                $sql = "UPDATE tab_modal_promocion
                SET Url         ='" . $link . "', 
                    Status      ='" . $visible . "',
                    Imagen_url  ='" . $imgPromocion . "'
                WHERE Id_promocion =" . $promocion . "";

                if (mysqli_query($con, $sql)) {
                    unlink("../../img/promocion/" . $Promocion['Imagen_url']);
                    move_uploaded_file($_FILES["imgPromocion"]["tmp_name"], "../../img/promocion/" . $_FILES['imgPromocion']['name']);
                    echo 0;
                } else {
                    echo 2;
                }
            } else {
                $sql = "UPDATE tab_modal_promocion
                SET Url         ='" . $link . "', 
                    Status      ='" . $visible . "',
                    Imagen_url  ='" . $imgPromocion . "'
                WHERE Id_promocion =" . $promocion . "";

                if (mysqli_query($con, $sql)) {
                    move_uploaded_file($_FILES["imgPromocion"]["tmp_name"], "../../img/promocion/" . $_FILES['imgPromocion']['name']);
                    echo 0;
                } else {
                    echo 3;
                }
            }
        }
    } else {
        echo 4;
    }
} else {
    $sql = "UPDATE tab_modal_promocion
    SET Url     ='" . $link . "', 
        Status  ='" . $visible . "'
    WHERE Id_promocion =" . $promocion . "";

    if (mysqli_query($con, $sql)) {
        echo 0;
    } else {
        echo 5;
    }
}

mysqli_close($con);

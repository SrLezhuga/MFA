<?php
include("../conexion.php");

$val = 0;

$Id = $_POST["vacante"];
$requisitos = $_POST["requisitos"];
$ofrecemos = $_POST["ofrecemos"];
$visible = $_POST["visible"];

$queryVacante = "SELECT img FROM tab_vacantes WHERE Id = " . $Id . "";
$rsVacante = mysqli_query($con, $queryVacante) or die(mysqli_error($con));
$Vacante = mysqli_fetch_array($rsVacante);

if (!empty($_FILES['imgVacante']['name'])) {
    if (($_FILES["imgVacante"]["type"] == "image/pjpeg")
        || ($_FILES["imgVacante"]["type"] == "image/jpeg")
        || ($_FILES["imgVacante"]["type"] == "image/png")
        || ($_FILES["imgVacante"]["type"] == "image/webp")
    ) {
        $imgVacante = $_FILES['imgVacante']['name'];
        if ($Vacante['img'] == $imgVacante) {

            $sql = "UPDATE tab_vacantes
                SET requisitos ='" . $requisitos . "', 
                ofrecemos ='" . $ofrecemos . "',
                visible = '" . $visible . "'
            WHERE Id =" . $Id . "";

            if (mysqli_query($con, $sql)) {
                echo 0;
            } else {
                echo 1;
            }
        } else {
            if (file_exists("../../img/vacantes/" . $Vacante['img'])) {
                $sql = "UPDATE tab_vacantes
                    SET requisitos ='" . $requisitos . "', 
                    ofrecemos ='" . $ofrecemos . "', 
                    img ='" . $imgVacante . "',
                    visible = '" . $visible . "'
                WHERE Id =" . $Id . "";

                if (mysqli_query($con, $sql)) {
                    unlink("../../img/vacantes/" . $Vacante['img']);
                    move_uploaded_file($_FILES["imgVacante"]["tmp_name"], "../../img/vacantes/" . $_FILES['imgVacante']['name']);
                    echo 0;
                } else {
                    echo 1;
                }
            } else {
                $sql = "UPDATE tab_vacantes
                    SET requisitos ='" . $requisitos . "', 
                    ofrecemos ='" . $ofrecemos . "', 
                    img ='" . $imgVacante . "',
                    visible = '" . $visible . "'
                WHERE Id =" . $Id . "";

                if (mysqli_query($con, $sql)) {
                    move_uploaded_file($_FILES["imgVacante"]["tmp_name"], "../../img/vacantes/" . $_FILES['imgVacante']['name']);
                    echo 0;
                } else {
                    echo 1;
                }
            }
        }
    } else {
        echo 1;
    }
} else {
    $sql = "UPDATE tab_vacantes
        SET requisitos ='" . $requisitos . "', 
        ofrecemos ='" . $ofrecemos . "',
        visible = '" . $visible . "'
    WHERE Id =" . $Id . "";

    if (mysqli_query($con, $sql)) {
        echo 0;
    } else {
        echo 1;
    }
}

mysqli_close($con);

<?php
include("../conexion.php");

$queryVacante = "SELECT DISTINCT vacante FROM tab_candidatos";
$rsVacante = mysqli_query($con, $queryVacante) or die(mysqli_error($con));
while ($Vacante = mysqli_fetch_array($rsVacante)) {

    echo '
    <fieldset class="border p-2">
        <legend class="w-auto"><span><i class="fas fa-user"></i></span> <b>' . $Vacante["vacante"] . '</b></legend>
        <table class="table table-sm table-hover">
            <tbody>
    ';

    $queryCV = "SELECT *  FROM tab_candidatos WHERE vacante = '" . $Vacante['vacante'] . "' AND status = 'Archivado'";
    $rsCV = mysqli_query($con, $queryCV) or die(mysqli_error($con));
    while ($CV = mysqli_fetch_array($rsCV)) {
        $extencion = explode('.', $CV['cv']);

        if ($extencion[1] == "pdf") {
            $ext = "pdf";
        } else {
            $ext = "word";
        }


        echo '
    <tr>
        <td>' . $CV['nombre'] . '</td>
        <td><a href="https://wa.me/52' . $CV['telefono'] . '?text=Me%20interesa%20el%20auto%20que%20estás%20vendiendo" target="_blank" >' . $CV['telefono'] . '</a></td>
        <td><button type="button" class="btn btn-outline-danger" data-toggle="tooltip" title="Descargar ' . $ext . '" data-placement="top" onclick="descargarCV(this)" value="' . $CV['Id'] . '"><i class="fas fa-file-' . $ext . '"></i></button></td>
    </tr>
    ';
    }

    echo '
            </tbody>
        </table>

    </fieldset>
    ';
}

?>
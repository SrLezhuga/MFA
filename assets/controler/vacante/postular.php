<?php
if (empty($_POST['candidato']) || empty($_POST['telefono']) || empty($_FILES['curriculum']['name'])) {
    echo 1;
} else {
    include("../conexion.php");
    date_default_timezone_set('America/Mexico_City');
    $curriculum = $_FILES['curriculum']['name'];
    $candidato = $_POST['candidato'];
    $vacante = $_POST['vacante'];
    $telefono = $_POST['telefono'];

    $ext = explode(".", $curriculum);
    $newCV = str_replace(".", "", $candidato)  . " CV." . $ext[1];
    $date = date('Y-m-d');

    move_uploaded_file($_FILES["curriculum"]["tmp_name"], "../../doc/" . $newCV);

    $sql = "INSERT INTO tab_candidatos VALUES(null,'$vacante','$candidato','$telefono','$newCV','$date','Sin revisar')";
    if (mysqli_query($con, $sql)) {
                
        mysqli_close($con);
        echo 0;
    }else {
        echo 1;
    }
}

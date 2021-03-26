<?php
include_once "conexion.php";

function getQuery(){

    $mysqli = conectar();
    $sql = "SELECT Nombre, Correo, Telefono FROM tab_suscripcion";
    return $mysqli->query($sql);
    }

?>
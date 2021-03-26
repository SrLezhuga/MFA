<?php
function conectar()
{
    $servidor = "localhost";
    $usuario = "root";
    $contra = "";
    $db = "mfa_web";

    $conexion = new mysqli($servidor, $usuario, $contra, $db);
    $conexion->set_charset("UTF-8");

    return $conexion;
}
/*
$host     = "localhost";
$user     = "root";
$password = "";
$db       = "mfa_web";
$base_url = "localhost";
*/
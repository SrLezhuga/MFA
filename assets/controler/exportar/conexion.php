<?php
function conectar()
{
    $servidor = "localhost";
    $usuario = "mayoreof_Mfa_2021";
    $contra = "mPH7#)So[4n%";
    $db = "mayoreof_mfa_web";

    $conexion = new mysqli($servidor, $usuario, $contra, $db);
    $conexion->set_charset("UTF-8");

    return $conexion;
}
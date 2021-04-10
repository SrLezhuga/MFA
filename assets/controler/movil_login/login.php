<?php
session_start();
include("../conexion.php");

$user = $_POST['correo'];
$pwd = $_POST['contra'];
$cookie = $_POST['cookie'];

//$encry = sha1($pwd);
$sql = "SELECT id_user, email_user, pass_user FROM movil_user WHERE email_user= '$user' AND pass_user = '$pwd'";

if ($con->query($sql)) {

    $query      =  $con->query($sql);
    $rs         =  $query->fetch_array();

    if ($cookie == "si") {
        setcookie("usu_mvl", "$user", time() + 365 * 24 * 60 * 60, "/mfa/LoginMovil");
    }

    echo 'ok';
    $_SESSION['code_user'] = $rs['id_user'];
    
} else {
    echo 'error';
}

mysqli_close($con);

<?php
include "conexion.php";

$user      = $_POST['formUser'];
$password  = $_POST['formPass'];

$encry = sha1($password);
$sql        =  "SELECT Priv FROM tab_login WHERE User= '$user' AND Pass = '$encry'";

if ($con->query($sql)) {

    $query      =  $con->query($sql);
    $rs         =  $query->fetch_array();
    $priv_user  =  $rs['Priv'];

    if ($priv_user == "Admin") {
        session_start();
        $_SESSION['priv_user'] = $rs['Priv'];
        header("Location: https://mayoreoferreteroatlas.com/mfa/Administrar");
    } elseif ($priv_user == "RH") {
        session_start();
        $_SESSION['priv_user'] = $rs['Priv'];
        header("Location: https://mayoreoferreteroatlas.com/mfa/Reclutamiento");
    } else {
        header("Location: https://mayoreoferreteroatlas.com/mfa/500");
    }
}

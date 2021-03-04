<?php
include "conexion.php";

$user      = $_POST['formUser'];
$password  = $_POST['formPass'];

$encry = sha1($password);
$sql        =  "SELECT * FROM tab_login WHERE User= '$user' AND Pass = '$encry'";
$query      =  $con->query($sql);
$rs         =  $query->fetch_array();
$priv_user  =  $rs['Priv'];
$type_user  =  $rs['User'];

if ($priv_user == "Admin") {
    header("Location: http://" . $base_url . "/mfa/Administrar");
} elseif ($priv_user == "RH") {
    header("Location: http://" . $base_url . "/mfa/Reclutamiento");
} else {
    header("Location: http://" . $base_url . "/mfa/404");
}

mysqli_close($con);

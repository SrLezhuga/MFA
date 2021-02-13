<?php
include("../conexion.php");
    $sucursal = $_POST["Suc"];

    $queryBannerSucursal = "SELECT Url_imagen FROM tab_banner_sucursal WHERE Url = '".$sucursal."'";
    $rsBannerSucursal = mysqli_query($con, $queryBannerSucursal) or die("Error de consulta");
    $BannerSucursal = mysqli_fetch_array($rsBannerSucursal);

    echo "assets/img/banners/".$BannerSucursal['Url_imagen'];
<?php
include("../conexion.php");

if (!empty($_FILES['file']['name']) && $_FILES['file']['name'] == null || !empty($_POST['Suc'])) {
    $sucursal = $_POST["Suc"];
    $img = $_FILES['file']['name'];

    if (($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/gif")) {
        if (file_exists("../../img/banners/".$_FILES['file']['name'])) {
            unlink("../../img/banners/" . $img);
            move_uploaded_file($_FILES["file"]["tmp_name"], "../../img/banners/".$_FILES['file']['name']);
            
           $sql = "UPDATE tab_banner_sucursal
                    SET Url_imagen='".$img."' 
                    WHERE Url='".$sucursal."'";

            if (mysqli_query($con, $sql)) {
                
                mysqli_close($con);
                echo "assets/img/banners/".$_FILES['file']['name'];
            }
        }else {

            $queryBannerSucursal = "SELECT Url_imagen FROM tab_banner_sucursal WHERE Url = '".$sucursal."'";
            $rsBannerSucursal = mysqli_query($con, $queryBannerSucursal) or die("Error de consulta");
            $BannerSucursal = mysqli_fetch_array($rsBannerSucursal);
            
            if (file_exists("../../img/banners/".$BannerSucursal['Url_imagen'])) {
                unlink("../../img/banners/" . $BannerSucursal['Url_imagen']);
            }
            move_uploaded_file($_FILES["file"]["tmp_name"], "../../img/banners/".$_FILES['file']['name']);

            $sql = "UPDATE tab_banner_sucursal
                    SET Url_imagen = '".$img."' 
                    WHERE Url = '".$sucursal."'";

            if (mysqli_query($con, $sql)) {
                
                mysqli_close($con);
                echo "assets/img/banners/".$_FILES['file']['name'];
            }
        }
    }else {
        echo 0;
    }
}else {
    echo 0;
}



<?php
include("../conexion.php");

$val = 0;

$sucursal = $_POST["sucursal"];

$queryGaleria = "SELECT * FROM tab_galeria WHERE Sucursal = '" . $sucursal . "'";
$rsGaleria = mysqli_query($con, $queryGaleria) or die("Error de consulta");
$Galeria = mysqli_fetch_array($rsGaleria);

if (!empty($_FILES['imgGaleria1']['name'])) {
    $imgGaleria1 = $_FILES['imgGaleria1']['name'];
    if ($Galeria['Img0'] != $imgGaleria1) {
        if (file_exists("../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria1']['name'])) {
            move_uploaded_file($_FILES["imgGaleria1"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria1']['name']);
        } else {
            unlink("../../img/" . $sucursal . "/galeria/" . $Galeria['Img0']);
            move_uploaded_file($_FILES["imgGaleria1"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria1']['name']);
        }
    }
} else {
    $imgGaleria1 = "";
}

if (!empty($_FILES['imgGaleria2']['name'])) {
    $imgGaleria2 = $_FILES['imgGaleria2']['name'];
    if ($Galeria['Img1'] != $imgGaleria2) {
        if (file_exists("../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria2']['name'])) {
            move_uploaded_file($_FILES["imgGaleria2"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria2']['name']);
        } else {
            unlink("../../img/" . $sucursal . "/galeria/" . $Galeria['Img1']);
            move_uploaded_file($_FILES["imgGaleria2"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria2']['name']);
        }
    }
} else {
    $imgGaleria2 = "";
}

if (!empty($_FILES['imgGaleria3']['name'])) {
    $imgGaleria3 = $_FILES['imgGaleria3']['name'];
    if ($Galeria['Img2'] != $imgGaleria3) {
        if (file_exists("../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria3']['name'])) {
            move_uploaded_file($_FILES["imgGaleria3"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria3']['name']);
        } else {
            unlink("../../img/" . $sucursal . "/galeria/" . $Galeria['Img2']);
            move_uploaded_file($_FILES["imgGaleria3"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria3']['name']);
        }
    }
} else {
    $imgGaleria3 = "";
}

if (!empty($_FILES['imgGaleria4']['name'])) {
    $imgGaleria4 = $_FILES['imgGaleria4']['name'];
    if ($Galeria['Img3'] != $imgGaleria4) {
        if (file_exists("../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria4']['name'])) {
            move_uploaded_file($_FILES["imgGaleria4"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria4']['name']);
        } else {
            unlink("../../img/" . $sucursal . "/galeria/" . $Galeria['Img3']);
            move_uploaded_file($_FILES["imgGaleria4"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria4']['name']);
        }
    }
} else {
    $imgGaleria4 = "";
}

if (!empty($_FILES['imgGaleria5']['name'])) {
    $imgGaleria5 = $_FILES['imgGaleria5']['name'];
    if ($Galeria['Img4'] != $imgGaleria5) {
        if (file_exists("../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria5']['name'])) {
            move_uploaded_file($_FILES["imgGaleria5"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria5']['name']);
        } else {
            unlink("../../img/" . $sucursal . "/galeria/" . $Galeria['Img4']);
            move_uploaded_file($_FILES["imgGaleria5"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria5']['name']);
        }
    }
} else {
    $imgGaleria5 = "";
}

if (!empty($_FILES['imgGaleria6']['name'])) {
    $imgGaleria6 = $_FILES['imgGaleria6']['name'];
    if ($Galeria['Img5'] != $imgGaleria6) {
        if (file_exists("../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria6']['name'])) {
            move_uploaded_file($_FILES["imgGaleria6"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria6']['name']);
        } else {
            unlink("../../img/" . $sucursal . "/galeria/" . $Galeria['Img5']);
            move_uploaded_file($_FILES["imgGaleria6"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria6']['name']);
        }
    }
} else {
    $imgGaleria6 = "";
}

if (!empty($_FILES['imgGaleria7']['name'])) {
    $imgGaleria7 = $_FILES['imgGaleria7']['name'];
    if ($Galeria['Img6'] != $imgGaleria7) {
        if (file_exists("../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria7']['name'])) {
            move_uploaded_file($_FILES["imgGaleria7"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria7']['name']);
        } else {
            unlink("../../img/" . $sucursal . "/galeria/" . $Galeria['Img6']);
            move_uploaded_file($_FILES["imgGaleria7"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria7']['name']);
        }
    }
} else {
    $imgGaleria7 = "";
}

if (!empty($_FILES['imgGaleria8']['name'])) {
    $imgGaleria8 = $_FILES['imgGaleria8']['name'];
    if ($Galeria['Img7'] != $imgGaleria8) {
        if (file_exists("../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria8']['name'])) {
            move_uploaded_file($_FILES["imgGaleria8"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria8']['name']);
        } else {
            unlink("../../img/" . $sucursal . "/galeria/" . $Galeria['Img7']);
            move_uploaded_file($_FILES["imgGaleria8"]["tmp_name"], "../../img/" . $sucursal . "/galeria/" . $_FILES['imgGaleria8']['name']);
        }
    }
} else {
    $imgGaleria8 = "";
}

$sql = "UPDATE tab_galeria
SET Img0 ='" . $imgGaleria1 . "', 
    Img1 ='" . $imgGaleria2 . "', 
    Img2 ='" . $imgGaleria3 . "', 
    Img3 ='" . $imgGaleria4 . "', 
    Img4 ='" . $imgGaleria5 . "', 
    Img5 ='" . $imgGaleria6 . "', 
    Img6 ='" . $imgGaleria7 . "',
    Img7 ='" . $imgGaleria8 . "'
WHERE Sucursal ='" . $sucursal . "'";

if (mysqli_query($con, $sql)) {
    echo 0;
} else {
    echo 1;
}

mysqli_close($con);

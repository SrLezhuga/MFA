
<?php

$recaptcha_secret = '6Len7XEaAAAAAGTEcowp6Nftnx7znchBD7rEK4f6'; 
$recaptcha_response = $_POST['recaptcha_response']; 
$url = 'https://www.google.com/recaptcha/api/siteverify'; 

$data = array( 'secret' => $recaptcha_secret, 'response' => $recaptcha_response, 'remoteip' => $_SERVER['REMOTE_ADDR'] ); 
$curlConfig = array( CURLOPT_URL => $url, CURLOPT_POST => true, CURLOPT_RETURNTRANSFER => true, CURLOPT_POSTFIELDS => $data ); 
$ch = curl_init(); 
curl_setopt_array($ch, $curlConfig); 
$response = curl_exec($ch); 
curl_close($ch);

$jsonResponse = json_decode($response);
if ($jsonResponse->success === true) { 
    echo "correcto";
    include "conexion.php";

    echo $user      = $_POST['formUser'];
    echo $password  = $_POST['formPass'];
    
    $encry = sha1($password);
    $sql        =  "SELECT * FROM tab_login WHERE User= '$user' AND Pass = '$encry'";
    $query      =  $con->query($sql);
    $rs         =  $query->fetch_array();
    $priv_user  =  $rs['Priv'];
    $type_user  =  $rs['User'];
    
    if ($con->query($sql)) {
        echo "consulta ok";
    }

    if ($priv_user == "Admin") {
        header("Location: https://mayoreoferreteroatlas.com/mfa/Administrar");
    } elseif ($priv_user == "RH") {
        header("Location: https://mayoreoferreteroatlas.com/mfa/Reclutamiento");
    } else {
        header("Location: https://mayoreoferreteroatlas.com/mfa/500");
    }
    
    mysqli_close($con);
} else {
    echo "error";
}





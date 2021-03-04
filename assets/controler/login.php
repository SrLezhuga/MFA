<?php

if (isset($_POST['action']) && ($_POST['action'] == 'process')) {

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
    $recaptcha_secret = '6Len7XEaAAAAAGTEcowp6Nftnx7znchBD7rEK4f6'; 
    $recaptcha_response = $_POST['recaptcha_response']; 
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); 
    $recaptcha = json_decode($recaptcha); 
    
    if($recaptcha->score >= 0.7){
    
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
                header("Location: ../../Administrar");
            } elseif ($priv_user == "RH") {
                header("Location: ../../Reclutamiento");
            } else {
                header("Location: ../../500");
            }
        }
    
        mysqli_close($con);
    
    } else {
    
        header("Location: ../../404");
    
    }
    
    }


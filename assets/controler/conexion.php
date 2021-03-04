<?php

$host     = "localhost";
$user     = "mayoreof_Mfa_2021";
$password = "mPH7#)So[4n%";
$db       = "mayoreof_mfa_web";
$base_url="localhost";

/*
$con = new mysqli($host, $user, $password, $db) or die("No se ha podido conectar al servidor de Base de datos");
mysqli_set_charset($con, 'utf8');
$db = mysqli_select_db($con, $db) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos de mayoreo");
$con->query("set names utf8");
*/

$con=mysqli_connect('127.0.0.1',$user,$password,$db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else{

  echo "conexion correcta";

}

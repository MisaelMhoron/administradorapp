<?php  

//! Sirve para verificar si un evento está guardado en la tabla favoritos

include 'laravel_connections.php';
// include 'laravel_connections2.php';

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

 $idEventos = $obj['idEventos'];
 $login_idLogin = $obj['login_idLogin'];  
 
//  $boolT = true;
//  $boolF = false;


$result = mysqli_query($link, "SELECT favoritos.idfavoritos FROM u493485681_appturismo.favoritos 
WHERE favoritos.idEventos = '$idEventos' and favoritos.login_idLogin = '$login_idLogin';");

//! found
if ($result->num_rows > 0) {
 
  echo $json = json_encode("true");
  // echo $json = json_encode($boolT);

 } else {
  echo $json = json_encode("false"); 
  // echo $json = json_encode($boolF);
 }

mysqli_close($link);
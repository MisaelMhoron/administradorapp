<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiIdfavoritoController extends Controller
{
    //
    public function getIdfavorito(){
    $link = mysqli_connect('localhost','u493485681_appsonsonate','Golgot@2020','u493485681_appturismo');
 if(!$link){
  echo 'connections field';
 }
        
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
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiIdloginTwoController extends Controller
{
    //
    public function getIdloginTwo(){
     $link = mysqli_connect('localhost','u493485681_appsonsonate','Golgot@2020','u493485681_appturismo');
 if(!$link){
  echo 'connections field';
 } 
        
$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$nombreUsuario = $obj['nombreUsuario'];     
$pasword = $obj['pasword'];

  $result = mysqli_query($link, "SELECT login.idLogin FROM u493485681_appturismo.login 
         WHERE login.nombreUsuario = '$nombreUsuario' and login.pasword = '$pasword';");

//! found
if ($result->num_rows > 0) {
 
  while($row[] = $result->fetch_assoc()) {
  
    $item = $row;
    $json = json_encode($item);
  }
  
  echo $json;

 } else {
  echo $json = json_encode("Nombre de usuario o Contrasenia incorrectos");
 }
  // echo $json;
  
mysqli_close($link);

}
}
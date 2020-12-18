<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiIdLoginController extends Controller
{
    //
    public function getIdLogin(){
   $link = mysqli_connect('localhost','u493485681_appsonsonate','Golgot@2020','u493485681_appturismo');
 if(!$link){
  echo 'connections field';
 }
    
$json = file_get_contents('php://input');
$obj = json_decode($json, true);

 $nombreUsuario = $obj['nombreUsuario'];     

  $result = mysqli_query($link, "SELECT login.idLogin FROM u493485681_appturismo.login 
  WHERE login.nombreUsuario = '$nombreUsuario';");

if(mysqli_num_rows($result)){
  while($row[] = mysqli_fetch_assoc($result)){
      $json = json_encode($row);
  }
   
} else {
    echo 'Consulta Login No realizada';
}

 echo  $json;

// echo 'vamosBien';

mysqli_close($link);
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiOtherInsertController extends Controller
{
    //
    public function getotherinsert(){
  $link = mysqli_connect('localhost','u493485681_appsonsonate','Golgot@2020','u493485681_appturismo');
 if(!$link){
  echo 'connections field';
 }
    $json = file_get_contents('php://input');
 $obj = json_decode($json, true); 

 $nombreUsuario = $obj['nombreUsuario']; 
 $pasword = $obj['pasword']; // nuevo campo
 $nacionalidad = $obj['nacionalidad'];
 $genero = $obj['genero'];
 $fechaNac = $obj['fechaNac']; // '2020-12-12';
 $created_at = $obj['created_at'];


 if($obj['nombreUsuario']!="" || $obj['nombreUsuario']!=null)
 {
 $result= mysqli_query($link, "SELECT * FROM u493485681_appturismo.login where nombreUsuario='$nombreUsuario'");
 if($result->num_rows>0){
 echo json_encode('Usuario ya existe'); // alert msg in react native //! Ojo con el texto: 'Usuario ya existe' porque hay una validación en RN que lo toma muy en cuenta
 }
 else
{
$add = mysqli_query($link, "INSERT INTO u493485681_appturismo.login (nombreUsuario, pasword, nacionalidad, genero, fechaNac, created_at) VALUES ('$nombreUsuario', '$pasword', '$nacionalidad', '$genero', '$fechaNac', '$created_at')");
if($add){
echo json_encode('Datos guardados'); //! Ojo con el texto: 'Datos guardados' porque hay una validación en RN que lo toma muy en cuenta
}
else{
echo json_encode('Chequea tu conexión a internet'); //! Ojo con el texto: 'Chequea tu conexión a internet' porque hay una validación en RN que lo toma muy en cuenta
}
}
}
else{
echo json_encode('Intenta de nuevo');
}


}}
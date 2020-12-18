<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiLoginInsertController extends Controller
{
    //
    public function getLoginInsert(){
        $link = mysqli_connect('localhost','u493485681_appsonsonate','Golgot@2020','u493485681_appturismo');
   if(!$link){
    echo 'connections field';
   }
   $json = file_get_contents('php://input');
   $obj = json_decode($json, true); 
  
   $nacionalidad = $obj['nacionalidad'];
   $genero = $obj['genero'];
   $fechaNac = $obj['fechaNac']; //! el problema es el campo fecha, pues no permite inserción de objeto, en el caso de fecha, y para efectos que funcione la simple insersiom de este objeto, debe de colocarse directamente el campo fecha, pero no para efectos de uso en app react native, allí sí debe ir la fecha en objeto osea esta línea debe ser tomada en cuenta
   // $fechaNac = '12-12-2020'; //! el problema es el campo fecha, pues no permite inserción de objeto, en el caso de fecha, y para efectos que funcione la simple insersiom de este objeto, debe de colocarse directamente el campo fecha, pero no para efectos de uso en app react native, allí sí debe ir la fecha en objeto osea esta línea debe ser tomada en cuenta
   //$fechaNac = date("Y-m-d H:i:s", strtotime($fechaNac));
  // $dateArray = explode('/', $_POST['fechaNac']);
  // $fechaNac = $dateArray[2].'-'.$dateArray[0].'-'.$dateArray[1];
  //$fechaNac=$_POST[$obj['fechaNac']];
  //  $fechaNac = date('Y-m-d',strtotime($_POST['fechaNac']));
  
  // $fechaNac = split('/', $date);
  // $date = $dateFormated[2].'-'.$dateFormated[0].'-'.$dateFormated[1];
  
  if(mysqli_query($link, "INSERT INTO login(nacionalidad, genero, fechaNac) VALUES('$nacionalidad', '$genero', '$fechaNac')")) {
  // if(mysqli_query($link, "INSERT INTO login(nacionalidad, genero, fechaNac) VALUES('$nacionalidad', '$genero', STR_TO_DATE('$fechaNac', '%Y/%m/%d'))")) {
  // if(mysqli_query($link, "INSERT INTO eventos (imagen, Nombre, fecha, Descripcion) VALUES ('$imagen', '$Nombre', '2019-12-30 15:27:31', '$Descripcion')")) {
  
      echo json_encode('Insertado exitoso');    
  } else {
      echo json_encode('Insertar ha fallado');
  }
   
  mysqli_close($link);


}
}

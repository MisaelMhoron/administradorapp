<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiasistenciasinfavController extends Controller
{
    //
    public function getAsistenciasinfav(){
        $link = mysqli_connect('localhost','u493485681_appsonsonate','Golgot@2020','u493485681_appturismo');
 if(!$link){
  echo 'connections field';
 }
    $json = file_get_contents('php://input');
 $obj = json_decode($json, true); 

 $interruptor = $obj['interruptor']; // 'insertar';
 $idEventos = $obj['idEventos']; // 95; 
 $login_idLogin = $obj['login_idLogin']; //246; 


 switch ($interruptor) {

   case "insertar":

    // if($obj['idEventos']!="" || $obj['idEventos']!=null)
    if($idEventos!="" || $idEventos!=null)
    {
      $result= mysqli_query($link, "SELECT asistencias FROM u493485681_appturismo.favoritos WHERE idEventos = '$idEventos' and login_idLogin='$login_idLogin';");
      // if($result->fetch_assoc() == '{"asistencias":null}' || $result->fetch_assoc() == 'null'){
        if($result->num_rows>0){ //todo: en este caso simpre va devolver 1 miesntras halla conexión, porque la fila existe, ya que consultamos sólo por un campo 

          $add = mysqli_query($link, "UPDATE u493485681_appturismo.favoritos SET asistencias = '1' WHERE idEventos = '$idEventos' and login_idLogin = '$login_idLogin';");
          if($add){
          //  $json = $result->fetch_assoc();
          //   echo json_encode($json); //todo el valor se actualiza después de la segunda actualización, cuando se prueba en el navegador se puede notar, pero no afecta en el proceso, para este caso, ya que no forma parte de ningún if
          echo json_encode('Vas a asistir. Genial'); //! Ojo con el texto: 'Vas a asistir. Genial' porque hay una validación en RN que lo toma muy en cuenta
          
          }
          else{
          echo json_encode('hubo un error inesperado'); //! Ojo con el texto: 'hubo un error inesperado' porque también hay una validación en RN que lo toma muy en cuenta
          }
      }
      else{
      echo json_encode('Chequea tu conexión a internet'); //! Ojo con el texto: 'Chequea tu conexión a internet' porque también hay una validación en RN que lo toma muy en cuenta
      }
    } else {
      echo json_encode('hubo un fallo durante el proceso, intenta de nuevo');
    }
  // echo "insertando";
  break;

    case "eliminar":

      if($idEventos!="" || $idEventos!=null)
    {
      $result= mysqli_query($link, "SELECT asistencias FROM u493485681_appturismo.favoritos WHERE idEventos = '$idEventos' and login_idLogin='$login_idLogin';");
      // if($result->fetch_assoc() == '{"asistencias":null}' || $result->fetch_assoc() == 'null'){
        if($result->num_rows>0){ //todo: en este caso simpre va devolver 1 miesntras halla conexión, porque la fila existe, ya que consultamos sólo por un campo

          $add = mysqli_query($link, "UPDATE u493485681_appturismo.favoritos SET asistencias = NULL WHERE idEventos = '$idEventos' and login_idLogin = '$login_idLogin';");
          if($add){
          //  $json = $result->fetch_assoc();
          //   echo json_encode($json);
          echo json_encode('Has indicado que no vas a asistir'); //! Ojo con el texto: 'Has indicado que no vas a asistir' porque hay una validación en RN que lo toma muy en cuenta
          
          }
          else{
          echo json_encode('hubo un error inesperado'); //! Ojo con el texto: 'hubo un error inesperado' porque también hay una validación en RN que lo toma muy en cuenta
          }
      // echo json_encode("Ya has indicado antes que vas a asistir"); //! Ojo con el texto: 'Este evento ya había sido guardado' porque hay una validación en RN que lo toma muy en cuenta
      }
      else{
      echo json_encode('Chequea tu conexión a internet'); //! Ojo con el texto: 'Chequea tu conexión a internet' porque también hay una validación en RN que lo toma muy en cuenta
      }
  } else {
    echo json_encode('hubo un fallo durante el proceso, intenta de nuevo');
  }
    // echo "eliminando";

        break;

        case "consultar":

          $result = mysqli_query($link, "SELECT asistencias FROM u493485681_appturismo.favoritos WHERE idEventos = '$idEventos' and login_idLogin='$login_idLogin';");
          
          //! found
          if ($result->num_rows > 0) {
           
            $row =  $result->fetch_assoc();
            // echo $json;
            echo $json = json_encode($row);
          
           } else {
            echo $json = json_encode("Chequea tu conexión a internet"); 
            // echo $json = json_encode($boolF);
           }

        break;
}

 
mysqli_close($link);


}
}
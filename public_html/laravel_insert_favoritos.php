<?php

include 'laravel_connections.php';

 $json = file_get_contents('php://input');
 $obj = json_decode($json, true); 

 $idEventos = $obj['idEventos']; 
 $login_idLogin = $obj['login_idLogin'];


 

 if($obj['idEventos']!="" || $obj['idEventos']!=null)
 {
 $result= mysqli_query($link, "SELECT * FROM u493485681_appturismo.favoritos where idEventos='$idEventos' and login_idLogin='$login_idLogin';");
 if($result->num_rows>0){
 echo json_encode('Este evento ya había sido guardado'); //! Ojo con el texto: 'Este evento ya había sido guardado' porque hay una validación en RN que lo toma muy en cuenta
 }
 else
{
$add = mysqli_query($link, "INSERT INTO u493485681_appturismo.favoritos (idEventos, login_idLogin) VALUES ('$idEventos', '$login_idLogin')");
if($add){
echo json_encode('¡Evento guardado!'); //! Ojo con el texto: '¡Evento guardado!' porque hay una validación en RN que lo toma muy en cuenta
}
else{
echo json_encode('Chequea tu conexión a internet'); //! Ojo con el texto: 'Chequea tu conexión a internet' porque también hay una validación en RN que lo toma muy en cuenta
}
}
}
else{
echo json_encode('Favor, intentar de nuevo');
}

?>
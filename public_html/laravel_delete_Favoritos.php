<?php

 //! Este archivo tiene un ligero error y es que así como está programado, siempre que haya conexión a internet
 //! intentará borrar y dirá que lo borró aunque no lo haya borrado por alguna razón por ejemplo porque algún parámetro 
 //! sea incorrecto. Pero dificilmente fallará porque los parametro de RN son siempre precisos.


// Importing DBConfig.php file.
include 'laravel_connections.php';
 
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);

 
 // Populate FAVORITES ID from JSON $obj array and store into $idfavoritos.
 $idEventos = $obj['idEventos']; 
 $login_idLogin = $obj['login_idLogin']; 
 
 // Creating SQL query and Updating the current record into MySQL database table.
 $Sql_Query = "DELETE FROM u493485681_appturismo.favoritos WHERE idEventos = '$idEventos' and login_idLogin = '$login_idLogin';" ;
 
 
 if(mysqli_query($link,$Sql_Query)){
 
 // If the record inserted successfully then show the message.
$MSG = 'Evento eliminado de Favoritos!' ; //! No cambiar esta frase, ya que es usada en RN para una condición
 
// Converting the message into JSON format.
$json = json_encode($MSG);
 
// Echo the message.
 echo $json ;
 
 }
 else{
 
 echo $json = json_encode('Intenta de nuevo'); //! Ni se debe cambiar esta frase, ya que es usada en RN para una condición
 
 }
 mysqli_close($link);
//  mysqli_close($con);

?>



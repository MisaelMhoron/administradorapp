<?php

namespace App\Http\Controllers;
use App\Eventos;
use Illuminate\Http\Request;

class ApiEventosController extends Controller
{
    //
    public function getEventos(){
    $link = mysqli_connect('localhost','u493485681_appsonsonate','Golgot@2020','u493485681_appturismo');
 if(!$link){
  echo 'connections field';
 }

$result = mysqli_query($link, "SELECT *, -- al seleccionar todo de eventos, se muestra de manera innecesaria 'mapa_idMapa', pero está bien.
(select titulo from u493485681_appturismo.mapa 
where eventos.mapa_idMapa = mapa.idMapa) as titulo, 

(select descripcion from u493485681_appturismo.mapa 
where eventos.mapa_idMapa = mapa.idMapa) as descripcMapa,

(select latitude from u493485681_appturismo.mapa 
where eventos.mapa_idMapa = mapa.idMapa) as latitude, 

(select longitude from u493485681_appturismo.mapa 
where eventos.mapa_idMapa = mapa.idMapa) as longitude

  FROM u493485681_appturismo.eventos ORDER BY idEventos DESC;");
  
//! found
if ($result->num_rows > 0) {
 
  while($row[] = $result->fetch_assoc()) {
  
    $item = $row;
    
    $json = json_encode($item);
  
  // echo $json; //! por nada debe estar descomentado
  }
  
  echo $json;

 } else {
  echo $json = json_encode("Sin eventos");
 }
  // echo $json;
  
mysqli_close($link);
}}
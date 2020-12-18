<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiFavoritosController extends Controller
{
    public function getFavoritos(){
        $link = mysqli_connect('localhost','u493485681_appsonsonate','Golgot@2020','u493485681_appturismo');
 if(!$link){
  echo 'connections field';
 }

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$login_idLogin = $obj['login_idLogin'];                  

$result = mysqli_query($link, "SELECT -- consulta funcional para (eventos) favoritos

u493485681_appturismo.favoritos.*,

 (select nombreUsuario from u493485681_appturismo.login 
where favoritos.login_idLogin = login.idLogin) as usuario,

 (select imagen from u493485681_appturismo.eventos 
where favoritos.idEventos = eventos.idEventos) as imagen,

(select Nombre from u493485681_appturismo.eventos 
where favoritos.idEventos = eventos.idEventos) as Nombre,

(select Descripcion from u493485681_appturismo.eventos 
where favoritos.idEventos = eventos.idEventos) as Descripcion,

(select fecha from u493485681_appturismo.eventos
where favoritos.idEventos = eventos.idEventos) as fecha,

(select hora from u493485681_appturismo.eventos
where favoritos.idEventos = eventos.idEventos) as hora,

 (select titulo from u493485681_appturismo.mapa, u493485681_appturismo.eventos  
where eventos.mapa_idMapa = mapa.idMapa and favoritos.idEventos = eventos.idEventos) as titulo, 

(select mapa.descripcion from u493485681_appturismo.mapa, u493485681_appturismo.eventos  
 where eventos.mapa_idMapa = mapa.idMapa and favoritos.idEventos = eventos.idEventos) as descripcMapa,

 (select latitude from u493485681_appturismo.mapa, u493485681_appturismo.eventos  
where eventos.mapa_idMapa = mapa.idMapa and favoritos.idEventos = eventos.idEventos) as latitude, 

 (select longitude from u493485681_appturismo.mapa, u493485681_appturismo.eventos  
where eventos.mapa_idMapa = mapa.idMapa and favoritos.idEventos = eventos.idEventos) as longitude

FROM u493485681_appturismo.favoritos

-- Cuando ocurrió el siguiente error:
-- Error Code: 1052. Column 'descripcion' in field list is ambiguous
-- lo solucioné anteponiéndole el nombre de la tabla a ese campo, así:
-- select mapa.descripcion ...
-- Pero eso es único de esta consulta 

WHERE  login_idLogin = '$login_idLogin' ORDER BY idEventos DESC;");


//! found
if ($result->num_rows > 0) {
 
  while($row[] = $result->fetch_assoc()) {
  
    $item = $row;
    
    $json = json_encode($item);
  
  // echo $json; //! por nada debe estar descomentado
  }
  
  echo $json;

 } else {
  echo $json = json_encode("Sin favoritos");
 }
  // echo $json;
  
mysqli_close($link);

}
}

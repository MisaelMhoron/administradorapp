<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiMenuInicioController extends Controller
{
    //
       public function getMenuInicio(){
       $link = mysqli_connect('localhost','u493485681_appsonsonate','Golgot@2020','u493485681_appturismo');
 if(!$link){
  echo 'connections field';
 }
$result = mysqli_query($link, 

"SELECT   -- consulta funcional del nivel 1
u493485681_appturismo.menu.*,
-- Nota: registro de menú que vaya sólo, como playa, debe llevar su IDDependencia
-- Nota 2: Bastaría sólo con seleccionar 'appturismo.menu.*;' pero se necesita la info de sitios únicos que no lleven sub menu, como la playa
-- ¡Importante! Hay Muchos campos que sólo están porque hay items con la etiqueta 'unique' y acceden direacto al screen

(select imagen from u493485681_appturismo.sitioturistico 
 where menu.sitio_idSitio = sitioturistico.idsitioturistico) as imgSitio,
 
  (select imagen2 from u493485681_appturismo.sitioturistico 
 where menu.sitio_idSitio = sitioturistico.idsitioturistico) as imgSitio2,
 
  (select imagen3 from u493485681_appturismo.sitioturistico 
 where menu.sitio_idSitio = sitioturistico.idsitioturistico) as imgSitio3,

(select texto from u493485681_appturismo.sitioturistico 
where menu.sitio_idSitio = sitioturistico.idsitioturistico) as texto,

 (select titulo from u493485681_appturismo.mapa, u493485681_appturismo.sitioturistico  
where sitioturistico.mapa_idMapa = mapa.idMapa and menu.sitio_idSitio = sitioturistico.idsitioturistico) as titulo, 

 (select descripcion from u493485681_appturismo.mapa, u493485681_appturismo.sitioturistico  
where sitioturistico.mapa_idMapa = mapa.idMapa and menu.sitio_idSitio = sitioturistico.idsitioturistico) as descripcMapa,

 (select latitude from u493485681_appturismo.mapa, u493485681_appturismo.sitioturistico  
where sitioturistico.mapa_idMapa = mapa.idMapa and menu.sitio_idSitio = sitioturistico.idsitioturistico) as latitude, 

 (select longitude from u493485681_appturismo.mapa, u493485681_appturismo.sitioturistico  
where sitioturistico.mapa_idMapa = mapa.idMapa and menu.sitio_idSitio = sitioturistico.idsitioturistico) as longitude

FROM u493485681_appturismo.menu
WHERE IDDependencia = 1 order by Orden asc;"
 );

if(mysqli_num_rows($result)){
   while($row[] = mysqli_fetch_assoc($result)){
       $json = json_encode($row);
   }
} else {
    echo 'result not found';
}

echo $json;

mysqli_close($link);
}
}
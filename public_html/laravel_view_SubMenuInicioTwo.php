<?php
include 'laravel_connections.php';
// include 'laravel_connections2.php';

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

  $Etiqueta = $obj['Etiqueta'];                  // _tradiciones  // _tradiciones
  $SubEtiqueta = $obj['SubEtiqueta'];  //* campo nuevo
  $IDDependencia = $obj['IDDependencia'];          // 1  //  3

$result = mysqli_query($link, "SELECT -- consulta funcional para submenu en nivel 3

appturismo.menu.*,

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
WHERE  (Etiqueta = '$Etiqueta') and (SubEtiqueta = '$SubEtiqueta') and IDDependencia = ($IDDependencia+1) order by Orden asc;");

if(mysqli_num_rows($result)){
   while($row[] = mysqli_fetch_assoc($result)){
       $json = json_encode($row);
   }
} else {
    echo 'result not found';
}

echo $json;

mysqli_close($link);
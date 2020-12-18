<?php
include 'laravel_connections.php';

$result = mysqli_query($link, "SELECT *, -- al seleccionar todo de alojamiento, se muestra de manera innecesaria 'mapa_idMapa', pero está bien.

(select titulo from u493485681_appturismo.mapa 
where alojamiento.mapa_idMapa = mapa.idMapa) as titulo, 

(select descripcion from u493485681_appturismo.mapa 
where alojamiento.mapa_idMapa = mapa.idMapa) as descripcMapa,

(select latitude from u493485681_appturismo.mapa 
where alojamiento.mapa_idMapa = mapa.idMapa) as latitude, 

(select longitude from u493485681_appturismo.mapa 
where alojamiento.mapa_idMapa = mapa.idMapa) as longitude

FROM u493485681_appturismo.alojamiento;");

if(mysqli_num_rows($result)){
   while($row[] = mysqli_fetch_assoc($result)){
       $json = json_encode($row);
   }
} else {
    echo 'result not found';
}

echo $json;

mysqli_close($link);
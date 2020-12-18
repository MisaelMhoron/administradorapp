<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiQRinfoController extends Controller
{
    //
    public function getQrinfo(){
     $link = mysqli_connect('localhost','u493485681_appsonsonate','Golgot@2020','u493485681_appturismo');
 if(!$link){
  echo 'connections field';
 }
        
$json = file_get_contents('php://input');
$obj = json_decode($json, true);

 $CodigoQR = $obj['CodigoQR'];          


// $result = mysqli_query($link, "SELECT nombre FROM appturismo.sitioturistico 
// WHERE sitioturistico.codeQR = 'icatedral.sonsotour';"); // Este ejemplo era para utilizarlo en otro caso (las dos lineas comentadas)

$result = mysqli_query($link, "SELECT *,
-- es muy necesario mejorar esta consulta, ya que se obtienen demaciados datos innecesarios al hacer select *...
(select titulo from u493485681_appturismo.mapa 
where sitioturistico.mapa_idMapa = mapa.idMapa) as titulo, 

(select descripcion from u493485681_appturismo.mapa 
where sitioturistico.mapa_idMapa = mapa.idMapa) as descripcMapa, 

(select latitude from u493485681_appturismo.mapa 
where sitioturistico.mapa_idMapa = mapa.idMapa) as latitude, 

(select longitude from u493485681_appturismo.mapa 
where sitioturistico.mapa_idMapa = mapa.idMapa) as longitude

FROM u493485681_appturismo.sitioturistico 
WHERE sitioturistico.codeQR = '$CodigoQR';");

if(mysqli_num_rows($result)){
   while($row[] = mysqli_fetch_assoc($result)){
       $json = json_encode($row);
   }
} else {
    echo 'Consulta QR No realizada';
}

echo $json;

mysqli_close($link);
    }
}

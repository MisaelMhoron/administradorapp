<?php

namespace App\Http\Controllers;
use App\SitioTuristico;
use App\Menu;
use App\laravel_connections;
use \Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class MenudosController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    //
    
    public function getConsulta( ){
    include 'laravel_connections.php';
     /*   $Sitio = SitioTuristico::all();
        $Menus= Menu::all();

        return Response::json(
            array(
                'sitioturistico' => $Sitio,
                'menu' => $Menus
            ),200);*/
      
    $result = mysqli_query($link, 
   "SELECT   -- consulta funcional
    appturismo.menu.*,
    -- Nota: registro de menú que vaya sólo, debe llevar su IDDependencia
    
    (select idsitioturistico from appturismo.sitioturistico -- campo no usado
     where menu.sitio_idSitio = sitioturistico.idsitioturistico) as idSitio,
    
     (select imagen from appturismo.sitioturistico 
     where menu.sitio_idSitio = sitioturistico.idsitioturistico) as imgSitio,

     (select imagen2 from appturismo.sitioturistico 
where menu.sitio_idSitio = sitioturistico.idsitioturistico) as imgSitio2,

(select imagen3 from appturismo.sitioturistico 
where menu.sitio_idSitio = sitioturistico.idsitioturistico) as imgSitio3,
    
    (select texto from appturismo.sitioturistico 
    where menu.sitio_idSitio = sitioturistico.idsitioturistico) as texto,
    
    (select urlmapa from appturismo.sitioturistico 
    where menu.sitio_idSitio = sitioturistico.idsitioturistico) as urlmapa
    
    FROM appturismo.menu
    WHERE menu.IDDependencia = 1 order by Orden asc;"
    );
   
   if(mysqli_num_rows($result)){
      while($row[] = mysqli_fetch_assoc($result)){
          $json = json_encode($row);
      }
   } else {
       echo 'result not found';
   }
   
  echo $json;

  //return Response::json($json);

 
   
   mysqli_close($link);
   }

   //--------------JSON PARA SUBMENULIST-------------------------
public function getConsultasub(){

// include 'laravel_connections2.php';
include 'laravel_connections.php';

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$Etiqueta = $obj['Etiqueta']; // _tradiciones  // _tradiciones
$IDDependencia = $obj['IDDependencia'];// 1  //  3
//$Etiqueta ='_tradiciones';

$result = mysqli_query($link, "SELECT -- consulta funcional para submenu y nivel 3
appturismo.menu.*,

 (select imagen from appturismo.sitioturistico 
where menu.sitio_idSitio = sitioturistico.idsitioturistico) as imgSitio,

(select imagen2 from appturismo.sitioturistico 
where menu.sitio_idSitio = sitioturistico.idsitioturistico) as imgSitio2,

(select imagen3 from appturismo.sitioturistico 
where menu.sitio_idSitio = sitioturistico.idsitioturistico) as imgSitio3,

(select texto from appturismo.sitioturistico 
where menu.sitio_idSitio = sitioturistico.idsitioturistico) as texto,

(select urlmapa from appturismo.sitioturistico 
where menu.sitio_idSitio = sitioturistico.idsitioturistico) as urlmapa

FROM appturismo.menu
where  (Etiqueta = '$Etiqueta' ) and IDDependencia = ($IDDependencia+1) order by Orden asc;");

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

<?php

namespace App\Http\Controllers;
use App\SitioTuristico;
use App\Menu;
use \Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class subconsultaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function getConsultasub(Request $request){
       include 'laravel_connections.php';
    // include 'laravel_connections2.php';
    
    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    
     $Etiqueta = $obj['Etiqueta']; // _tradiciones  // _tradiciones
    
      $IDDependencia = $obj['IDDependencia'];// 1  //  3
    //$Etiqueta ='_tradiciones';
    
    $result = mysqli_query($link, "SELECT -- consulta funcional para submenu y nivel 3
    appturismo.menu.*,
    
     (select imagen from appturismo.sitioturistico 
    where menu.sitio_idSitio = sitioturistico.idsitioturistico) as imgSitio,
    
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

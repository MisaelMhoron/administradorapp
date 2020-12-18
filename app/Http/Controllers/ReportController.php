<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Login;
use App\Eventos;
use App\Favoritos;
use Carbon\Carbon;

use App\Http\Requests;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use DB;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class ReportController extends Controller
{
    //

    public function generar()
    {

        $favoritos = \DB::table('favoritos')
->select(DB::raw('Nombre'),DB::raw('fecha'),   DB::raw('count(*) as number'))
->join('eventos','favoritos.idEventos','eventos.idEventos')
->groupBy('Nombre','fecha') 
->get();

$view = \View::make('reportes.reporte',compact('favoritos'))->render();
$pdf = \App::make('dompdf.wrapper');
$pdf->loadHTML($view);


return $pdf->download('informe'.'reporte.pdf');

    }
}

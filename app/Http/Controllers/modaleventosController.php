<?php

namespace App\Http\Controllers;
use App\Eventos;
use App\Login;
use App\Mapas;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use File;

class modaleventosController extends Controller
{
    //
       
    public function __construct()
    {
        $this->middleware('auth');
    }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            //    
            $buscar = $request->get('buscarpor');
            $tipo = $request->get('tipo');
      
          
       $Event = Eventos::buscarpor($tipo, $buscar)->orderBy('idEventos','DESC')->get();
        
            return view('asignacategory.modalevento',compact('Event'));  
        }
}

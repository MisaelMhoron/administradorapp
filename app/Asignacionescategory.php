<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacionescategory extends Model
{
    //
        //Esto le permitirá llamar al método de relleno sin declarar cada campo.
        protected $fillable = ['idAsignacionesCat', 'idCategorias','idEventos'];
        //   protected $guarded = array();
           ////////////////////////////////////////////////////
          protected $table = 'asignacionescat';
           protected $primaryKey = 'idAsignacionesCat';
           public $timestamps = false;
           
           public function scopeBuscarpor($query, $tipo, $buscar) {
            if ( ($tipo) && ($buscar) ) {
              return $query->where($tipo,'like',"%$buscar%");
            }
          }
           public function eventos()
           {
             return $this->belongsTo('App\Eventos','idEventos');
         //    return $this->hasMany('App\Article', 'nombre_clave_foranea');
      //   return $this->belongsTo('App\Writer');
           } 
           public function category()
           {
             return $this->belongsTo('App\Categorias','idCategorias');
         //    return $this->hasMany('App\Article', 'nombre_clave_foranea');
      //   return $this->belongsTo('App\Writer');
           } 
}

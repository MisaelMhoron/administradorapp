<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
     //Esto le permitirá llamar al método de relleno sin declarar cada campo.
     protected $fillable = ['idMenu', 'nombre', 'imagen','Etiqueta','SubEtiqueta','IDDependencia','Orden','sitio_idSitio'];
  //   protected $guarded = array();
     ////////////////////////////////////////////////////
    protected $table = 'menu';
     protected $primaryKey = 'idMenu';
     public $timestamps = false;

     public function Sitioturis()
     {
       return $this->belongsTo('App\SitioTuristico','sitio_idSitio');
   //    return $this->hasMany('App\Article', 'nombre_clave_foranea');
     } 

     
     public function scopeBuscarpor($query, $tipo, $buscar) {
      if ( ($tipo) && ($buscar) ) {
        return $query->where($tipo,'like',"%$buscar%");
      }
    }

}

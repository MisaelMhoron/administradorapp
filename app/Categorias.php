<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    //
    protected $fillable = ['idCategorias', 'Categoria'];
    //   protected $guarded = array();
       ////////////////////////////////////////////////////
      protected $table = 'categorias';
       protected $primaryKey = 'idCategorias';
       public $timestamps = false;

       public function asicat()
       {
         return $this->hasOne('App\Asignacionescategory','idCategorias');
     //    return $this->hasMany('App\Article', 'nombre_clave_foranea');
       } 
       public function scopeBuscarpor($query, $tipo, $buscar) {
        if ( ($tipo) && ($buscar) ) {
          return $query->where($tipo,'like',"%$buscar%");
        }
      }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapcategory extends Model
{
    //
       //Esto le permitirá llamar al método de relleno sin declarar cada campo.
       protected $fillable = ['idMapCategoty', 'Categoria'];
       //   protected $guarded = array();
          ////////////////////////////////////////////////////
         protected $table = 'map_category';
          protected $primaryKey = 'idMapCategoty';
          public $timestamps = false;

          public function mapaz()
          {
            return $this->hasOne('App\Mapas','map_idMapCategoty');
        //    return $this->hasMany('App\Article', 'nombre_clave_foranea');
          } 

// para filtrar busqueda *****************************/
          public function scopeBuscarpor($query, $tipo, $buscar) {
            if ( ($tipo) && ($buscar) ) {
              return $query->where($tipo,'like',"%$buscar%");
            }
          }
//**************************************************** */

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alojamiento extends Model
{
    //

        //
       //Esto le permitirá llamar al método de relleno sin declarar cada campo.
       protected $fillable = ['id', 'nombre ', 'direccion','imagen ','imagen2 ','imagen3','descripcion','linkFacebook','linkInstagram','numWhatsapp','linkPageWeb','mapa_idMapa','telefono'];
       ////////////////////////////////////////////////////
      protected $table = 'alojamiento';
       protected $primaryKey = 'id';
      // protected $fillable = ['imagen', 'nacionalidad', 'genero','fechaNac'];
     // protected $fillable = [] ;
       # No queremos que ponga updated_at ni created_at
       public $timestamps = false;

       public function mapa()
{
    return $this->belongsTo('App\Mapas','mapa_idMapa');
}

public function scopeBuscarpor($query, $tipo, $buscar) {
    if ( ($tipo) && ($buscar) ) {
      return $query->where($tipo,'like',"%$buscar%");
    }
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurantes extends Model
{
    //
    protected $fillable = ['idRest', 'nombreRest ', 'direccion','imagen ','imagen2 ','imagen3','descripcion','facebookLink','instagramLink','whatsappNum','pageWebLink','mapa_idMapa','telefono'];
    ////////////////////////////////////////////////////
   protected $table = 'restaurantes';
    protected $primaryKey = 'idRest';
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

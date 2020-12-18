<?php
namespace App\Scopes;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    //
    //protected $connection = 'mysql-utf8';
     //Esto le permitirá llamar al método de relleno sin declarar cada campo.
   
     ////////////////////////////////////////////////////
    protected $table = 'eventos';
     protected $primaryKey = 'idEventos';

     protected $fillable = ['idEventos', 'imagen', 'Nombre','Descripcion','fecha','linkFacebook','hora','mapa_idMapa'];

     public function getUrlPathAttribute()
     {
         return \Storage::url($this->eventos);
     }

     public function scopeName($query, $Nombre){
      //  dd("scope:".$Nombre);
      
if ($Nombre != ""){

    $query -> where ('Nombre', $Nombre);

}

     }

     public function scopeBuscarpor($query, $tipo, $buscar) {
        if ( ($tipo) && ($buscar) ) {
          return $query->where($tipo,'like',"%$buscar%");
        }
      }
// relacion de tablas
public function mapa()
{
    return $this->belongsTo('App\Mapas','mapa_idMapa');
}


public function asicat()
{
    return $this->belongsTo('App\Asignacionescategory','idCategorias');
}



}

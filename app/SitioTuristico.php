<?php
namespace App\Scopes;
namespace App;

use Illuminate\Database\Eloquent\Model;

class SitioTuristico extends Model
{
    //
    protected $fillable = ['idsitioturistico', 'nombre', 'imagen','imagen2','imagen3','imgQR','texto','textoQR','codeQR','mapa_idMapa'];
      //Esto le permitirá llamar al método de relleno sin declarar cada campo.
    //  protected $guarded = array();
      ////////////////////////////////////////////////////
    protected $table = 'sitioturistico';
      protected $primaryKey = 'idsitioturistico';
      public $timestamps = false;


   public function scopeName($query, $nombre){
        //  dd("scope:".$Nombre);
        
  if ($nombre != ""){
  
      $query -> where ('nombre', $nombre);
  
  }
  
       }

       public function scopeBuscarpor($query, $tipo, $buscar) {
        if ( ($tipo) && ($buscar) ) {
          return $query->where($tipo,'like',"%$buscar%");
        }
      }

      public function mapa()
{
    return $this->belongsTo('App\Mapas','mapa_idMapa');
}

public function menus()
{
  return $this->hasOne('App\Menu','sitio_idSitio');
//    return $this->hasMany('App\Article', 'nombre_clave_foranea');
//   return $this->belongsTo('App\Writer');
} 

}

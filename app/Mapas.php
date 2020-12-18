<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapas extends Model
{
    //
       //Esto le permitirá llamar al método de relleno sin declarar cada campo.
       protected $fillable = ['idMapa', 'titulo', 'descripcion','latitude','longitude','map_idMapCategoty'];
       ////////////////////////////////////////////////////
      protected $table = 'mapa';
       protected $primaryKey = 'idMapa';
      // protected $fillable = ['imagen', 'nacionalidad', 'genero','fechaNac'];
     // protected $fillable = [] ;
       # No queremos que ponga updated_at ni created_at
       public $timestamps = false;
       
       public function scopeBuscarpor($query, $tipo, $buscar) {
        if ( ($tipo) && ($buscar) ) {
          return $query->where($tipo,'like',"%$buscar%");
        }
      }
       public function evento()
       {
         return $this->hasOne('App\Eventos', 'mapa_idMapa');
       } 
       public function restaurant()
       {
         return $this->hasOne('App\Restaurantes', 'mapa_idMapa');
       } 

     public function Sitiotur()
       {
         return $this->hasOne('App\SitioTuristico', 'mapa_idMapa');
       } 

       public function alojaminetos()
       {
         return $this->hasOne('App\alojamiento', 'mapa_idMapa');
       } 

       public function Mapazcat()
       {
         return $this->belongsTo('App\Mapcategory','map_idMapCategoty');
     //    return $this->hasMany('App\Article', 'nombre_clave_foranea');
  //   return $this->belongsTo('App\Writer');
       } 

      }

<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{

    //Esto le permitirá llamar al método de relleno sin declarar cada campo.
    protected $fillable = ['idLogin', 'nombreUsuario','pasword' ,'nacionalidad','genero','fechaNac','created_at'];
    ////////////////////////////////////////////////////
 
   protected $table = 'login';
    protected $primaryKey = 'idLogin';
   // protected $fillable = ['imagen', 'nacionalidad', 'genero','fechaNac'];
  // protected $fillable = [] ;
    # No queremos que ponga updated_at ni created_at
    public $timestamps = false;

    public function scopeName($query, $genero){
      //  dd("scope:".$Nombre);
      
if ($genero != ""){

    $query -> where ('genero', $genero);

}

     }

     public function scopeBuscarpor($query, $tipo, $buscar) {
    	if ( ($tipo) && ($buscar) ) {
    		return $query->where($tipo,'like',"%$buscar%");
    	}
    }
}

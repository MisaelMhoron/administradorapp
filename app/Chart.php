<?php
namespace App\Scopes;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
   //
   protected $fillable = ['idLogin', 'nombreUsuario', 'nacionalidad','genero','fechaNac','created_at'];
   //Esto le permitirá llamar al método de relleno sin declarar cada campo.
 //  protected $guarded = array();
   ////////////////////////////////////////////////////
 protected $table = 'idLogin';
   protected $primaryKey = 'login';
   public $timestamps = false;


public function scopeName($query, $genero){
     //  dd("scope:".$Nombre);
     
if ($genero != ""){

   $query -> where ('genero', $genero);

}

    }
}

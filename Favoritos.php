<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    //
        //Esto le permitirá llamar al método de relleno sin declarar cada campo.
        protected $fillable = ['idfavoritos', 'idEventos', 'login_idLogin','asistencias'];
        ////////////////////////////////////////////////////
        
       protected $table = 'favoritos';
        protected $primaryKey = 'idfavoritos';
       // protected $fillable = ['imagen', 'nacionalidad', 'genero','fechaNac'];
      // protected $fillable = [] ;
        # No queremos que ponga updated_at ni created_at
        public $timestamps = false;
}

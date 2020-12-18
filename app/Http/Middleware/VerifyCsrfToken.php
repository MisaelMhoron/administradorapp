<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/api/v1/otherinsert',
         '/api/v1/idlogin',
         'api/v1/idloginTwo',
         'api/v1/submenuinicio',
         'api/v1/submenuinicioTwo',
        '/api/v1/insertfavoritos',
        '/api/v1/idfavorito',
        '/api/v1/deletefavoritos',
        '/api/v1/favoritos',
        'api/v1/Qrinfo',
      'api/v1/asistenciasinfav',
    ];
}

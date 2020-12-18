<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('reporte','ReportController@generar');
Auth::routes();

//***** PARA VERIFICAR USUARIO */
Auth::routes(['verify' => true]);
//----------------------------//


//---------------- JSON ----------------------------
//Route::get('api/v1/eventos','EventosController@getEventos');

Route::get('api/jsusuario','InicioController@getLogin');
Route::get('api/jturis','SitioTuristicoController@getSitio');
Route::get('api/jmenu','MenuController@getMenu');
Route::get('api/consulta','MenudosController@getConsulta');
Route::get('api/consultados','MenudosController@getConsultasub');
Route::get('api/consultasub','subconsultaController@getConsultasub');
Route::get('api/restaurantejson','RestaurantesController@getRestaurante');
Route::resource('/apiconsulta','consulta');

 // Route::GET('otherinsertar/', 'UsuariologinController@store');
  
 /******************************* */
  //  Route::post('api/v1/otherinsert','ApiOtherInsertController@getotherinsert');
//Route::post('api/v1/idlogin','ApiIdLoginController@getIdLogin');
/* rutas para la api json */

Route::group(["middleware" => "apikey.validate"], function () {
  //modal
   Route::resource('/modal', 'modalmapaController');
   Route::resource('/modalsitio', 'modalsitioController');
   
   
   //-- ------------------------------------------------- --//
    //Rutas
    Route::get('api/v1/eventos','ApiEventosController@getEventos');
      Route::get('api/v1/logininsert','ApiLoginInsertController@getLoginInsert');
      
      
     Route::get('api/v1/restaurantes','ApiRestaurantesController@getRestaurante');  
   Route::post('api/v1/deletefavoritos','ApiDeleteFavoritosController@getDeletefavoritos');
    Route::post('api/v1/insertfavoritos','ApiInsertFavoritosController@getInsertFavoritos');
    Route::get('api/v1/alojamiento','ApiAlojamientoController@getAlojamiento');
     Route::post('api/v1/favoritos','ApiFavoritosController@getFavoritos');
      Route::post('api/v1/idlogin','ApiIdLoginController@getIdLogin');
          Route::post('api/v1/idloginTwo','ApiIdloginTwoController@getIdloginTwo');
    Route::get('api/v1/menuinicio','ApiMenuInicioController@getMenuInicio');
   Route::post('api/v1/idfavorito','ApiIdfavoritoController@getIdfavorito');
      Route::post('api/v1/Qrinfo','ApiQRinfoController@getQrinfo');
        Route::post('api/v1/submenuinicio','ApiSubmenuinicioController@getSubmenuinicio');
          Route::post('api/v1/submenuinicioTwo','ApiSubmenuinicioTwoController@getSubmenuinicioTwo');
       Route::post('api/v1/otherinsert','ApiOtherInsertController@getotherinsert');
       
         Route::post('api/v1/asistenciasinfav','ApiasistenciasinfavController@getAsistenciasinfav');
         
    
  });
//----------- RUTAS ---------------------------------
Route::resource('/usuarios', 'InicioController');
Route::resource('/Eventos', 'EventosController');
//**************para busqueda*********************** */
//Route::get('/', 'EventosController@index')->name('users');

//Route::get('/', 'InicioController@index')->name('usuarios');

//************************************************* */
//Route::get ('/usuarios','InicioController@index');
Route::resource('/Menu', 'MenuController');
Route::resource('/sitioturistico', 'SitioTuristicoController');

Route::resource('/modalcategoriamapa', 'ModalcategoriamapaController');  
Route::resource('/modalevento', 'modaleventosController');   
Route::resource('/modalcategoria', 'modalcategoriaController'); 
 

Route::resource('/alojamiento', 'AlojamientoController');
Route::resource('/mapascategory', 'MapcategoryController');
Route::resource('/asignacategory', 'AsignacionescategoryController');
Route::resource('/Categorias', 'CategoriasController');
Route::resource('/restaurantes', 'RestaurantesController');
Route::resource('/pruebas', 'Pruebas');

Route::resource('/mapas', 'MapasController');
Route::get('Eventos/{idEventos}/imagen', 'EventosController@image');

Route::put('/sitioturistico/{idsitioturistico}', 'SitioTuristicoController@destroy')->name('sitioturistico/eliminar');
route::resource('/graficas','ChartController');

//Route::get("/eliminar/{id}", "CancionesController@eliminarCancion")
   // ->name("eliminarCancion");




Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

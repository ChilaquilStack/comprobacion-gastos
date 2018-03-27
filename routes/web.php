<?php
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
Route::get('/', function () {
    return view('index');
});

Route::post('municipio/buscar', 'MunicipioController@buscar');
Route::get('municipio/municipios', 'MunicipioController@municipios');
Route::get('municipio/municipios_all', 'MunicipioController@municipios_all');
Route::resource('municipio', 'MunicipioController');

Route::post('region/buscar', 'RegionController@buscar');
Route::get('region/regiones', 'RegionController@regiones');
Route::get('region/regiones_all', 'RegionController@regiones_all');
Route::resource('region', 'RegionController');

Route::get('uog/uogs', 'EscuelaController@escuelas');
Route::resource('uog', 'EscuelaController');

Route::post('up/buscar', 'UPController@buscar');
Route::get('up/ups', 'UPController@ups');
Route::get('up/ups_all', 'UPController@ups_all');
Route::resource('up', 'UPController');

Route::get('ur/urs', 'URController@urs'); 
Route::get('ur/urs_all', 'URController@urs_all');
Route::resource('ur', 'URController'); 

Route::get('ueg/uegs', 'UEGController@uegs');
Route::get('ueg/uegs_all', 'UEGController@uegs_all');
Route::resource('ueg', 'UEGController');

Route::get('tpg/tpgs', 'TPGController@tpgs');
Route::resource('tpg', 'TPGController');

Route::resource('cog', 'COGController');

Route::resource('usuario', 'UsuarioController');

Route::match(['get','post'], 'login', 'Auth\LoginController@authenticate')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

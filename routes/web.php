<?php
Route::get('/', function () {
    return view('index');
});

Route::get('municipio/municipios', 'MunicipioController@municipios');
Route::get('municipio/municipios_all', 'MunicipioController@municipios_all');
Route::resource('municipio', 'MunicipioController');

Route::get('region/regiones', 'RegionController@regiones');
Route::get('region/regiones_all', 'RegionController@regiones_all');
Route::resource('region', 'RegionController');

Route::get('escuela/escuelas', 'EscuelaController@escuelas');
Route::resource('escuela', 'EscuelaController');


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

Route::resource('usuario', 'UsuarioController');

Route::match(['get','post'], 'login', 'Auth\LoginController@authenticate')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
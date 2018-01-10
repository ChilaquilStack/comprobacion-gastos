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
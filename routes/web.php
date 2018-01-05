<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/municipios', function () {
    return view('municipios.index');
});
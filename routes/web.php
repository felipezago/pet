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
    return view('auth/telalogin');
});

Auth::routes();

Route::get('/registrar', function () {
    return view('auth/registrar');
});

Route::get('/telalogin', function() {
    return view('auth/telalogin');
});

Route::resource('/usuario', 'UsuarioController');
Route::resource('/pets', 'PetController');
Route::resource('/vets', 'VeterinarioController');
Route::resource('/consulta', 'ConsultaController');
Route::resource('/valida', 'ValidarController');


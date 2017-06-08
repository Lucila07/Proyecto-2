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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'ComidaController@index');

Auth::routes();

Route::get('/home', 'ComidaController@index');

//Route::get('/vegetales/json', 'VegetalController@json');
Route::get('/vegetales/json', 'ComidaController@json');

Route::get('/edit/{id}', 'ComidaController@edit');

Route::post('guardarCambios', 'ComidaController@buttonSave');
Route::post('agregarComida', 'ComidaController@buttonAñadir');

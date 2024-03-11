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

// Mostrar la vista inicial
Route::get('/', 'GeneralController@index');
Route::post('/', 'GeneralController@store');
Route::get('/active/{bcrypt}', 'GeneralController@activar');

Route::get('/usuarios', 'GeneralController@lista');

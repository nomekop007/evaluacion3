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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard','palletController@index')->name('dashboard');


//redirecciona a las vista correspondientes
Route::get('pallet','palletController@index')->name('pallet');
Route::get('bodega','bodegaController@index')->name('bodega');
Route::get('seleccion','historyController@seleccion')->name('seleccion');

//redirecciona modal history
Route::post('history','historyController@index')->name('history');

//redirecciona al controller que crear
Route::post('createPallet','palletController@create')->name('createPallet'); 
Route::post('createBodega','bodegaController@create')->name('createBodega'); 



Route::post('getPallet','palletController@getByID')->name('getPallet'); // redirecciona al controller a la funcino que busca pallet
Route::post('deletePallet','palletController@destroy')->name('deletePallet'); // elimina pallet

Route::post('updatePallet','palletController@update')->name('updatePallet'); // editar pallet

Route::post('moverSeleccion','historyController@mover')->name('moverSeleccion'); // mover a seleccion el pallet

Route::post('moverBodega','historyController@mover2')->name('moverBodega'); // mover a bodega el pallet

Route::post('devolver','historyController@vaciar')->name('devolver'); // devolver vacio el pallet a bodega
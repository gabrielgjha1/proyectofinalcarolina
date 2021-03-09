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


    Route::get('/', 'inicioController@inicio')->name('inicio.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/proyectos/create','ProyectoController@create')->name('proyecto.create');
Route::get('/proyectos','ProyectoController@index')->name('proyecto.index');
Route::get('/proyectos/{proyecto}/edit','ProyectoController@edit')->name('proyecto.edit');

Route::put('/proyectos/rechazarproyecto/{proyecto}','ProyectoController@rechazarProyecto')->name('proyecto.rechazar');
Route::put('/proyectos/confimarproyecto/{proyecto}','ProyectoController@ConfirmarProyecto')->name('proyecto.confirmar');

Route::post('/proyectos','ProyectoController@store')->name('proyecto.store');

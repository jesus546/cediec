<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'inicioController@index')->name('inicio');
Route::get('/perfil', 'HomeController@profile')->name('perfil');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/schedule', 'pacientController@schedule')->name('schedule');
Route::get('/appointments', 'pacientController@appointments')->name('appointments');
Auth::routes(['verify'=> true]);


Route::group(['middleware' => ['auth']], function () {

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'permissionController');

    Route::get('/usuarios', 'usersController@index')->name('usuarios.index');
         

    Route::post('/usuarios', 'usersController@store')->name('usuarios.store');
           

    Route::get('/usuarios/create', 'usersController@create')->name('usuarios.create');
         

    Route::put('/usuarios/{usuario}', 'usersController@update')->name('usuarios.update');
           

    Route::delete('/usuarios/{usuario}', 'usersController@destroy')->name('usuarios.destroy');
      

    Route::get('/usuarios/{usuario}/edit', 'usersController@edit')->name('usuarios.edit');
          

    
});




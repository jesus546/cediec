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


Auth::routes(['verify'=> true]);


Route::group(['middleware' => ['auth']], function () {

    Route::get('/perfil', 'HomeController@profile')->name('perfil');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('pacient/{usuario}/schedule', 'pacientController@back_schedule')->name('pacient.schedule')
    ->middleware('permission:asignar cita');

    Route::post('pacient/{usuario}/store_back_schedule', 'pacientController@store_back_schedule')->name('pacient.store_back_schedule')
    ->middleware('permission:asignar cita');

    Route::get('back_appointments', 'pacientController@show_appointments')->name('pacient.appointments.show');
    Route::get('back_appointments/doctor/{empleado}/appointments', 'pacientController@show_doctor_appointments')->name('pacient.appointments.doctor.show');
    
    Route::get('pacient/{usuario}/appointments', 'pacientController@back_appointments')->name('pacient.appointments')
    ->middleware('permission:listar cita');

    Route::get('pacient/{usuario}/appointments/{appointments}/edit', 'pacientController@back_appointments_edit')->name('pacient.appointments.edit');  

    Route::post('pacient/{usuario}/appointments/{appointments}/update', 'pacientController@back_appointments_update')->name('pacient.appointments.update');

    Route::resource('specialities', 'SpecialitiesController');

    Route::get('/invoice', 'pacientController@invoice')->name('invoice')
    ->middleware('role:User');

    Route::get('/schedule', 'pacientController@schedule')->name('schedule')
    ->middleware('role:User');

    Route::post('/store_schedule', 'pacientController@store_schedule')->name('store_schedule')
    ->middleware('role:User');


    Route::resource('empleados', 'empleadosController');

    Route::get('empleados/{empleado}/asignar_speciality', 'empleadosController@asignar_speciality')->name('empleados.asignar_speciality')
              ->middleware('permission:listar especialidades');
              
    Route::post('empleados/{empleado}/speciality_assignment', 'empleadosController@speciality_assignment')
    ->name('empleados.speciality_assignment')->middleware('permission:listar especialidades');

    Route::get('empleados/{empleado}/asignar_permission', 'empleadosController@asignar_permission')
              ->name('empleados.asignar_permission');
    Route::post('empleados/{empleado}/permission_assignment', 'empleadosController@permission_assignment')
            ->name('empleados.permission_assignment');

    

    Route::get('/appointments', 'pacientController@appointments')->name('appointments')
    ->middleware('role:User');
    

    Route::get('/usuarios', 'usersController@index')->name('usuarios.index')
                 ->middleware('permission:listar usuario');

    Route::post('/usuarios', 'usersController@store')->name('usuarios.store')
              ->middleware('permission:registrar usuario');
           
    Route::get('/usuarios/create', 'usersController@create')->name('usuarios.create')
                ->middleware('permission:registrar usuario');

    Route::put('/usuarios/{usuario}', 'usersController@update')->name('usuarios.update')
                  ->middleware('permission:editar usuario');

    Route::delete('/usuarios/{usuario}', 'usersController@destroy')->name('usuarios.destroy')
               ->middleware('permission:eliminar usuario');
      

    Route::get('/usuarios/{usuario}/edit', 'usersController@edit')->name('usuarios.edit')
               ->middleware('permission:editar usuario');

    
});

Route::group(['middleware' => ['auth'], 'as' => 'ajax.'],  function () {
        Route::get('user_speciality', 'ajaxController@user_speciality')->name('user_speciality');
});


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
    Route::get('back_appointments/doctor/{empleado}/appointments', 'pacientController@show_doctor_appointments')
    ->name('pacient.appointments.doctor.show');
    
    Route::get('pacient/{usuario}/appointments', 'pacientController@back_appointments')->name('pacient.appointments')
    ->middleware('permission:listar cita');

    Route::get('pacient/{usuario}/appointments/{appointments}/edit', 'pacientController@back_appointments_edit')
    ->name('pacient.appointments.edit');  
    
    Route::get('pacient/{usuario}/invoice', 'pacientController@back_invoice')->name('back.invoice');

    Route::get('pacient/{usuario}/invoice/{invoice}/edit', 'pacientController@back_invoice_edit')->name('back.invoice.edit');
    
    Route::post('pacient/{usuario}/invoice/{invoice}/update', 'pacientController@back_invoice_update')->name('back.invoice.update');

    Route::post('pacient/{usuario}/appointments/{appointments}/actualizar', 'pacientController@back_appointments_update')->name('pacient.appointments.update');

    Route::resource('specialities', 'SpecialitiesController');
    
    Route::get('/invoice', 'pacientController@invoice')->name('invoice')
    ->middleware('role:User');

    Route::get('/schedule', 'pacientController@schedule')->name('schedule')
    ->middleware('role:User');

    Route::post('/store_schedule', 'pacientController@store_schedule')->name('store_schedule')
    ->middleware('role:User');

    Route::get('/appointments', 'pacientController@appointments')->name('appointments')
    ->middleware('role:User');


    Route::resource('empleados', 'empleadosController');
   
    #asignar especialidades
    Route::get('empleados/{empleado}/asignar_speciality', 'empleadosController@asignar_speciality')->name('empleados.asignar_speciality')
              ->middleware('permission:listar especialidades');
              
    Route::post('empleados/{empleado}/speciality_assignment', 'empleadosController@speciality_assignment')
    ->name('empleados.speciality_assignment')->middleware('permission:listar especialidades');


    #asignacion de permisos
    Route::get('empleados/{empleado}/asignar_permission', 'empleadosController@asignar_permission')
              ->name('empleados.asignar_permission');
    Route::post('empleados/{empleado}/permission_assignment', 'empleadosController@permission_assignment')
            ->name('empleados.permission_assignment');


    #listar a un usuario
    Route::get('/usuarios', 'usersController@index')->name('usuarios.index')
                 ->middleware('permission:listar usuario');
    #registrar a un usuario
    Route::get('/usuarios/create', 'usersController@create')->name('usuarios.create')
                ->middleware('permission:registrar usuario');
    Route::post('/usuarios', 'usersController@store')->name('usuarios.store')
              ->middleware('permission:registrar usuario');
           
    #eliminar un usuario
    Route::delete('/usuarios/{usuario}', 'usersController@destroy')->name('usuarios.destroy')
               ->middleware('permission:eliminar usuario');
      
   #editar usuario
    Route::get('/usuarios/{usuario}/edit', 'usersController@edit')->name('usuarios.edit')
               ->middleware('permission:editar usuario');
    Route::put('/usuarios/{usuario}', 'usersController@update')->name('usuarios.update')
                  ->middleware('permission:editar usuario');
  #crear historia clinica
    Route::resource('patient/{user}/clinic_data', 'ClinicDataController', ['only' => [
                'index', 'create', 'store'
            ]]);
  #gestionar horario del doctor
  Route::get('doctor/{empleado}/doctor_schedule', 'DoctorScheduleController@assign')
  ->name('doctor.schedule.assign');
  Route::post('doctor/{empleado}/doctor_schedule', 'DoctorScheduleController@assignment')
  ->name('doctor.schedule.assignment');


    
});

Route::group(['middleware' => ['auth'], 'as' => 'ajax.'],  function () {
        Route::get('user_speciality', 'ajaxController@user_speciality')->name('user_speciality');
        Route::get('municipio', 'ajaxController@municipio')->name('municipio');
        Route::get('doctor/disable_dates', 'ajaxController@disable_dates')->name('doctor.disable_dates');
        Route::get('doctor/disable_times', 'ajaxController@disable_times')->name('doctor.disable_times');

});


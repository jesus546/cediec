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
    Route::get('/cambiarContraseña', 'HomeController@password_update_view')->name('password_update_view')->middleware(['auth', 'password.confirm']);
    Route::put('/password_update', 'HomeController@password_update')->name('password_update');
    

    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
  

    #asignacion de cita paciente
    Route::get('pacient/{usuario}/schedule', 'pacientController@back_schedule')->name('pacient.schedule')
    ->middleware('permission:asignar cita');
    Route::post('pacient/{usuario}/store_back_schedule', 'pacientController@store_back_schedule')->name('pacient.store_back_schedule')
    ->middleware('permission:asignar cita');
    #ver citas agendadas
    Route::get('back_appointments', 'pacientController@show_appointments')->name('pacient.appointments.show')
    ->middleware('permission:ver citas programadas');
    #ver citas agendadas del doctor
    Route::get('back_appointments/doctor/{empleado}/appointments', 'pacientController@show_doctor_appointments')
    ->name('pacient.appointments.doctor.show')->middleware('role:Doctor');

    #listar cita paciente
    Route::get('pacient/{usuario}/appointments', 'pacientController@back_appointments')->name('pacient.appointments')
    ->middleware('permission:listar cita paciente');
    #editar cita paciente
    Route::get('pacient/{usuario}/appointments/{appointments}/edit', 'pacientController@back_appointments_edit')
    ->name('pacient.appointments.edit')->middleware('permission:editar cita paciente');  
    Route::post('pacient/{usuario}/appointments/{appointments}/actualizar', 'pacientController@back_appointments_update')->name('pacient.appointments.update')
    ->middleware('permission:editar cita paciente');
    
  
    /////////
    Route::resource('specialities', 'SpecialitiesController');
    ///////////
    #solos lo pueden ver los usuarios con el rol User
    //obtener factura
    Route::get('/invoice', 'pacientController@invoice')->name('invoice')
    ->middleware('role:User');
    //agendar cita
    Route::get('/schedule', 'pacientController@schedule')->name('schedule')
    ->middleware('role:User');
    Route::post('/store_schedule', 'pacientController@store_schedule')->name('store_schedule')
    ->middleware('role:User');
     //listar citas
    Route::get('/appointments', 'pacientController@appointments')->name('appointments')
    ->middleware('role:User');

  ///////////////////////
    Route::resource('empleados', 'empleadosController');
   ////////////
    #asignar especialidades
    Route::get('empleados/{empleado}/asignar_speciality', 'empleadosController@asignar_speciality')->name('empleados.asignar_speciality')
              ->middleware('permission:asignar especialidad');
              
    Route::post('empleados/{empleado}/speciality_assignment', 'empleadosController@speciality_assignment')
    ->name('empleados.speciality_assignment')->middleware('permission:asignar especialidad');


    #asignacion de permisos
    Route::get('empleados/{empleado}/asignar_permission', 'empleadosController@asignar_permission')
              ->name('empleados.asignar_permission')->middleware('permission:asignar permisos');
              
    Route::post('empleados/{empleado}/permission_assignment', 'empleadosController@permission_assignment')
            ->name('empleados.permission_assignment')->middleware('permission:asignar permisos');


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
    Route::resource('patient/{usuario}/clinic_data', 'ClinicDataController', ['only' => [
                'index', 'create', 'store'
            ]]);
    Route::get('patient/{usuario}/donwload', 'ClinicDataController@PDF_HistoriaClinica')->name('pdf_historia');
    Route::get('patient/{usuario}/hola', 'ClinicDataController@hola')->name('hola');

  #crear notas de evolucion
  Route::resource('patient/{usuario}/clinic_note', 'ClinicNoteController', ['only' => [
    'index','create','store', 'edit', 'update', 'destroy'
    ]]);
    
  #gestionar horario del doctor
  Route::get('doctor/gestionar_horario', 'DoctorScheduleController@gestionar_horario')
  ->name('doctor.gestionar_horario')->middleware('permission:asignar horario doctor');

  Route::get('doctor/{empleado}/doctor_schedule', 'DoctorScheduleController@assign')
  ->name('doctor.schedule.assign')->middleware('permission:asignar horario doctor');
  
  Route::post('doctor/{empleado}/doctor_schedule', 'DoctorScheduleController@assignment')
  ->name('doctor.schedule.assignment')->middleware('permission:asignar horario doctor');
 

    
});

Route::group([ 'as' => 'ajax.'],  function () {

     
        Route::get('user_speciality', 'ajaxController@user_speciality')->name('user_speciality');
        Route::get('municipios', 'ajaxController@municipio_ajax')->name('municipio');
        Route::get('doctor/disable_dates', 'ajaxController@disable_dates')->name('doctor.disable_dates');
        Route::get('doctor/disable_times', 'ajaxController@disable_times')->name('doctor.disable_times');

});


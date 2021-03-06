<?php

namespace App\Http\Controllers;

use App\appointments;
use App\Invoice;
use App\User;
use App\price;
use Illuminate\Http\Request;
use App\specialities;

use Illuminate\Support\Facades\Auth;


use RealRashid\SweetAlert\Facades\Alert;

class pacientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function schedule()
    {
        return view('paciente.schedule', [
            'usuario' =>Auth::user(),
            'specialities' => specialities::all()
        ]);
    }

    public function store_schedule(Request $request, appointments $appointments)
    {
         $appointments = $appointments->store($request);
         Alert::success('EXITO', 'Su Cita ha sido creada')->showConfirmButton('OK', '#3085d6');
         return redirect()->route('appointments');
    }

    public function appointments()
    {
        $appointments = Auth::user()->appointments->sortBy('dates');
        return view('paciente.appointments', compact('appointments'));
    }
    
    public function back_schedule($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.pacient.schedule', compact('usuario'), [
            'specialities' => specialities::all()
        ]);
    }

    public function store_back_schedule(Request $request, appointments $appointments, $id )
    {
        $usuario = User::findOrFail($id);
    
        $appointments = $appointments->store($request);
         Alert::success('EXITO', 'se ha creado la cita')->showConfirmButton('OK', '#3085d6');
         return redirect()->route('pacient.appointments', $usuario);
    }
    public function back_appointments($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.pacient.appointments', compact('usuario'), [
            'appointments' => $usuario->appointments->sortBy('dates')
        ]);
    }

    public function back_appointments_edit(User $usuario, appointments $appointments)
    {
        return view('usuarios.pacient.appointments_edit',[
            'appointments' => $appointments,
            'usuario' => $usuario
        ]);
    }
     
    public function back_appointments_update(Request $request, User $usuario, appointments $appointments)
    {
        $appointments->my_update($request);
        Alert::success('EXITO', 'Cita actualizada')->showConfirmButton('OK', '#3085d6');
        return redirect()->route('pacient.appointments', $usuario);
    }
    
   
   public function show_appointments(User $empleado)
   {
       $appointments_collection = appointments::where('doctor_id', $empleado->id)->get();
       $appointments = [];
       foreach ($appointments_collection as $key => $appointment) {
           
           $appointments[] = [
               'title' => ucwords($appointment->user_id()->nombres) . ' cita con doctor(a) ' . $appointment->doctor()->nombres,
               'start' => $appointment->dates->format('Y-m-d\TH:i:s')
           ];
       }
    return view('back_appointments.show_appointments', [
        'appointments' =>  json_encode($appointments),
        'empleado' => $empleado,
    ]);
   }

   public function show_doctor_appointments(User $empleado)
   {
       $this->authorize('view_appointments_calendar', $empleado);
       $appointments_collection = appointments::where('doctor_id', $empleado->id)->get();
       $appointments = [];
       foreach ($appointments_collection as $key => $appointment) {
           
           $appointments[] = [
               'title' => ucwords($appointment->user_id()->nombres) . ' cita con doctor(a) ' . $appointment->doctor()->nombres,
               'start' => $appointment->dates->format('Y-m-d\TH:i:s')
           ];
       }
    return view('back_appointments.show_appointments', [
        'empleado' => $empleado,
        'appointments' =>  json_encode($appointments) 
    ]);
   }
  
   public function files(User $usuario)
   {
       return view('usuarios.pacient.index_files', [
           'usuario' => $usuario
       ]);
   }
   
   
}

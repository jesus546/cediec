<?php

namespace App\Http\Controllers;

use App\appointments;
use App\User;
use Illuminate\Http\Request;
use App\specialities;

use Illuminate\Support\Facades\Auth;


use RealRashid\SweetAlert\Facades\Alert;

class pacientController extends Controller
{
   
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
         return redirect('/appointments');
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

    public function store_back_schedule(Request $request, appointments $appointments, $id)
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

    public function back_appointments_edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.pacient.appointments_edit', compact('usuario'), [
            'specialities' => specialities::all()
        ]);
    }
   
}

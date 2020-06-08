<?php

namespace App\Http\Controllers;

use App\appointmet;
use App\User;
use Illuminate\Http\Request;
use App\specialities;
use Carbon\Carbon;;
use RealRashid\SweetAlert\Facades\Alert;

class pacientController extends Controller
{
   
    public function schedule()
    {
        return view('paciente.schedule', [
            'specialities' => specialities::all()
        ]);
    }

    public function store_schedule(Request $request, appointmet $appointmet)
    {
       
         $appointmet = $appointmet->store($request);
         
         Alert::success('EXITO', 'Su Cita ha sido creada')->showConfirmButton('OK', '#3085d6');
         return redirect()->route('paciente.appointments');
    }

    public function appointments()
    {
        return view('paciente.appointments');
    }
    
    public function back_schedule($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.pacient.schedule', compact('usuario'), [
            'specialities' => specialities::all()
        ]);
    }
    public function back_appointments($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.pacient.appointments', compact('usuario'));
    }
   
}

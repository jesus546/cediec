<?php

namespace App\Http\Controllers;

use App\appointments;
use App\Invoice;
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

    public function store_schedule(Request $request, appointments $appointments, Invoice $invoice)
    {
         $invoice = $invoice->store($request);
         $appointments = $appointments->store($request, $invoice);
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

    public function store_back_schedule(Request $request, appointments $appointments, $id, Invoice $invoice)
    {
        $usuario = User::findOrFail($id);
        $invoice = $invoice->store($request);
        $appointments = $appointments->store($request, $invoice);
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

    public function back_appointments_edit($id, appointments $appointments)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.pacient.appointments_edit', compact('usuario'), [
            'appointments' => $appointments
        ]);
    }
     
    public function back_appointments_update(Request $request, appointments $appointments, $id)
    {
        $usuario = User::findOrFail($id);
        $appointments->my_update($request);
        Alert::success('EXITO', 'Cita actualizada')->showConfirmButton('OK', '#3085d6');
        return redirect()->route('pacient.appointments', $usuario);
    }
    
    public function invoice()
    {
        return view('usuarios.pacient.invoice', [
            'invoices' => Auth::user()->invoice,
        ]);
    }

   public function show_appointments()
   {
       $appointments_collection = appointments::all();
       $appointments = [];
       foreach ($appointments_collection as $key => $appointment) {
           
           $appointments = [
               'title' => $appointment->user_id . ' cita con ' . $appointment->doctor_id,
               'start' => $appointment->dates->format('Y-m-d\Th:i:s')
           ];
       }
    return view('back_appointments.show_appointments', [
        'appointments' =>  json_encode($appointments) 
    ]);
   }
   
}

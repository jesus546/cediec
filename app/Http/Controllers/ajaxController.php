<?php

namespace App\Http\Controllers;


use App\specialities;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;




class ajaxController extends Controller
{
    public function user_speciality(Request $request){
        
        if ($request->ajax()) {
            $speciality = specialities::findOrFail($request->speciality );
            $users = $speciality->users;
            return response()->json($users);
        }
    }

    public function municipio(Request $request){
        
       
    }

    public function disable_dates(Request $request)
    {
    if($request->ajax()){
    $empleado = User::findOrFail($request->doctor);
    return response()->json([
    'disable_dates' => $empleado->manual_disabled_dates(),
    'days_off' => $empleado->days_off(),
    ]);
    }
   }
   


   public function disable_times(Request $request)
   {
       if($request->ajax()){
           // Detemrinar el usuario
           $empleado = \App\User::findOrFail($request->doctor);
           
           // Determinar el día
           $date = Carbon::parse($request->date);
           $day = $date->dayOfWeek + 1;
   
           //Arreglo de horarios
           $hours = json_decode($empleado->hours(), true);
           $date = $date;
           $appointments = $empleado->doctor_appointments()
                                ->whereDate('dates', $date)
                                ->get()
                                ->pluck('dates')
                                ->toJson();
           return response()->json([
               'hours' => $hours,
               'day' => $day,
               'dates' => $date,
                'appointments' => $appointments
           ]);
       }
   }
}

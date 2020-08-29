<?php

namespace App\Http\Controllers;

use App\municipio;
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

    public function municipio_ajax(Request $request)
    {
        if($request->ajax()) { 
            $municipios = municipio::where('fk_departamento', $request->fk_departamento)->get();
            foreach ($municipios as $municipio) {
                $municipioArr[$municipio->id] = $municipio->nombre;
            } 

            return response()->json($municipioArr);
        }
            
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
           $empleado = User::findOrFail($request->doctor);
           
           // Determinar el día
           $dates = Carbon::parse($request->dates);
           $day = $dates->dayOfWeek + 1;
   
           //Arreglo de horarios
           $hours = json_decode($empleado->hours(), true);
           $date = $dates;
           $appointments = $empleado->doctor_appointments('doctor')
                                ->whereDate('dates', $date)
                                ->get()
                                ->pluck('dates')
                                ->toJson();

          
       }

       return response()->json([
        'hours' => $hours,
        'day' => $day,
        'dates' => $date,
       'appointments' => $appointments,
    ]);
   }

   

}

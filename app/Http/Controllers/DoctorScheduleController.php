<?php

namespace App\Http\Controllers;

use App\DoctorSchedule;
use App\User;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function assign(User $empleado)
    {
    return view('empleados.doctor.schedule', [
    'empleado' => $empleado,
    'days' => ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']

    ]);
    }
    public function assignment(Request $request, User $empleado, DoctorSchedule $doctor_schedule)
    {
    $msj = [];
    $msj[0] = $doctor_schedule->disable_dates($request, $empleado);
    $msj[1] = $doctor_schedule->disable_work_days($request, $empleado);
    $msj[2] = $doctor_schedule->disable_hours($request, $empleado);

    return redirect()->route('doctor.schedule.assign', $empleado);
    }
    

}

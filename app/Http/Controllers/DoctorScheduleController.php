<?php

namespace App\Http\Controllers;

use App\DoctorSchedule;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DoctorScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function gestionar_horario()
    {
        $empleados = User::role('Doctor')->get();
        return view('empleados.doctor.index_doctor', ['empleados' => $empleados]);
    }
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
    Alert::success('EXITO', 'se ha creado el horario al doctor ', $empleado->nombres)->showConfirmButton('OK', '#3085d6');
    return redirect()->route('doctor.gestionar_horario');
    }
    

}

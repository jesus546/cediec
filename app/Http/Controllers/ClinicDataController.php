<?php

namespace App\Http\Controllers;

use App\ClinicData;
use App\ClinicNote;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClinicDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Doctor|super-admin|Admisionista|Administrador')->only(['index']);
        $this->middleware(['role:Doctor','permission:crear y/o actualizar historia clinica medicina interna'])->only(['create', 'store']);

    }
    public function index(User $usuario, ClinicNote $clinic_note)
       {
     
        return view('usuarios.pacient.clinic_data_index',[
        'usuario' => $usuario,
        'datas' => $usuario->clinic_data_array(),
        'clinic_note' => $clinic_note,
        ]);
       }


    
    public function create(User $usuario)
    {

        return view('usuarios.pacient.clinic_data',[
            'usuario' => $usuario,
            'datas' => $usuario->clinic_data_array()
        ]);

    }

  
    public function store(Request $request, User $usuario, ClinicData $clinic_data)
  {
    $clinic_data->store($request, $usuario);
    Alert::success('EXITO', 'Se ha actualizado la historia clinica')->showConfirmButton('OK', '#3085d6');
    return redirect()->route('clinic_note.create', $usuario);

  }
  
  
    
    
}

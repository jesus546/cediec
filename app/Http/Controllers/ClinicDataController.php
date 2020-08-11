<?php

namespace App\Http\Controllers;

use App\ClinicData;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ClinicDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $usuario)
       {
     
        return view('usuarios.pacient.clinic_data_index',[
        'usuario' => $usuario,
        'datas' => $usuario->clinic_data_array()
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
    return redirect()->route('clinic_data.index');

  }
  
  public function PDF_HistoriaClinica(User $usuario){
    $pdf = PDF::loadView('usuarios.pacient.history',[
      'usuario' => $usuario,
      'datas' => $usuario->clinic_data_array()
       ]);

    return $pdf->download('HistoriaClinica'. $usuario->identificacion.'.pdf');

  }
  public function hola(User $usuario){
    return view('usuarios.pacient.history',[
      'usuario' => $usuario,
      'datas' => $usuario->clinic_data_array()
       ]);
  }
    
    
}

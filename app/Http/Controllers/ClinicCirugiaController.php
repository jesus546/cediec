<?php

namespace App\Http\Controllers;

use App\Clinic_cirugia;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClinicCirugiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Doctor|super-admin|Admisionista|Administrador')->only(['index']);
        $this->middleware('role:Doctor|super-admin|Admisionista|Administrador')->only(['show']);
        $this->middleware(['role:Doctor','permission:crear historia clinica cirugia'])->only(['create', 'store']);
        $this->middleware(['role:Doctor','permission:editar historia clinica cirugia'])->only(['edit', 'update']);

    }
    public function index( User $usuario)
    {
        return view('usuarios.history_cirugia.history_index',[
            'usuario' => $usuario,
            'surgery' => $usuario->clinic_cirugia->sortByDesc('created_at'),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $usuario)
    {
        return view('usuarios.history_cirugia.history_create',[
            'usuario' => $usuario,
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $usuario,Clinic_cirugia $surgery)
    {
         $surgery->store($request, $usuario);
         Alert::success('EXITO', 'Se ha creado la historia clinica')->showConfirmButton('OK', '#3085d6');
           return redirect()->route('surgery.index', $usuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clinic_cirugia  $clinic_cirugia
     * @return \Illuminate\Http\Response
     */
    public function show( User $usuario,Clinic_cirugia $surgery)
    {
        return view('usuarios.history_cirugia.history_show',[
            'usuario' => $usuario,
            'surgery' => $surgery,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clinic_cirugia  $clinic_cirugia
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario, Clinic_cirugia $surgery)
    {
        return view('usuarios.history_cirugia.history_edit',[
            'usuario' => $usuario,
            'surgery' => $surgery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clinic_cirugia  $clinic_cirugia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario, Clinic_cirugia $surgery)
    {
   
        $surgery->my_update($request);
        Alert::success('EXITO', 'Se ha actualizado la historia clinica')->showConfirmButton('OK', '#3085d6');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinic_cirugia  $clinic_cirugia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic_cirugia $clinic_cirugia)
    {
        //
    }
    public function PDF_HistoriaClinicaSurgey(User $usuario, Clinic_cirugia $surgery){
        $pdf = PDF::loadView('usuarios.history_cirugia.history_surgey',[
          'usuario' => $usuario,
          'surgery' => $surgery,
           ]);
    
        return $pdf->download('HistoriaClinicaCirugia'. $usuario->identificacion.'.pdf');
    
      }
}

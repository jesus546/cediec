<?php

namespace App\Http\Controllers;

use App\ClinicNote;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClinicNoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Doctor|super-admin|Admisionista|Administrador')->only(['index']);
        $this->middleware(['role:Doctor','permission:crear nota de evolucion'])->only(['create', 'store']);
        $this->middleware(['role:Doctor','permission:crear nota de evolucion'])->only(['edit', 'update']);

    }
    public function index( User $usuario)
    {
        return view('usuarios.pacient.clinicNoteIndex',[
            'usuario' => $usuario,
            'clinic_notes' => $usuario->clinic_notes->sortByDesc('created_at'),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $usuario)
    {
        return view('usuarios.pacient.clinicNote',[
            'usuario' => $usuario,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $usuario, ClinicNote $clinic_note)
     {
           $clinic_note->store($request, $usuario);
           Alert::success('EXITO', 'Se ha creado la nota de evolución')->showConfirmButton('OK', '#3085d6');   
            return redirect()->route('clinic_note.index', $usuario);
            
     
           
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClinicNote  $clinicNote
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicNote $clinicNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClinicNote  $clinicNote
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario, ClinicNote $clinic_note)
    {
        return view('usuarios.pacient.clinicNoteEdit',[
            'usuario' => $usuario,
            'clinic_note' => $clinic_note,
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClinicNote  $clinicNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario, ClinicNote $clinic_note)
    {
        $clinic_note->my_update($request);
        Alert::success('EXITO', 'Se ha actualizado la nota')->showConfirmButton('OK', '#3085d6');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClinicNote  $clinicNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicNote $clinicNote)
    {
        //
    }

    public function PDF_HistoriaClinica(User $usuario, ClinicNote $clinic_note){
        $pdf = PDF::loadView('usuarios.pacient.history',[
          'usuario' => $usuario,
          'datas' => $usuario->clinic_data_array(),
          'clinic_note' => $clinic_note,
           ]);
    
        return $pdf->download('HistoriaClinica'. $usuario->identificacion.'.pdf');
    
      }
}

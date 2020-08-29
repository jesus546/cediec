<?php

namespace App\Http\Controllers;

use App\ClinicNote;
use App\User;
use Illuminate\Http\Request;

class ClinicNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, ClinicNote $clinicNote)
    {
        //
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
}

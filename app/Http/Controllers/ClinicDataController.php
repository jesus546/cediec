<?php

namespace App\Http\Controllers;

use App\ClinicData;
use App\User;
use Illuminate\Http\Request;

class ClinicDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
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
}

    
    public function show(ClinicData $clinicData)
    {
        //
    }

    public function edit(ClinicData $clinicData)
    {
        //
    }

    public function update(Request $request, ClinicData $clinicData)
    {
        //
    }

    public function destroy(ClinicData $clinicData)
    {
        //
    }
}

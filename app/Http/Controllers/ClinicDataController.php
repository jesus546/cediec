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

    
    public function create(User $user)
    {
        return view('usuarios.pacient.clinic_data',[
            'user' => $user,
            'datas' => $user->clinic_data_array()

        ]);

    }

  
    public function store(Request $request)
    {
        //
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

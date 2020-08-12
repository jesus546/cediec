<?php

namespace App\Http\Controllers;

use App\Http\Requests\Speciality\StoreRequest;
use App\Http\Requests\Speciality\UpdateRequest;
use App\specialities;
use RealRashid\SweetAlert\Facades\Alert;

class SpecialitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $specialities = specialities::all();
        return view('specialities.index', ['specialities' => $specialities]);
    }

    
    public function create()
    {
        return view('specialities.create');
    }

   
    public function store(StoreRequest $request, specialities $specialities)
    {
        $specialities = $specialities->store($request);
        Alert::success('EXITO', 'Se ha creado la especialidasd')->showConfirmButton('OK', '#3085d6'); 
        return redirect()->route('specialities.index');
    }

   
    public function show(specialities $specialities)
    {
        //
    }

    public function edit($id)
    {
        $specialities = specialities::findOrFail($id);
        return view('specialities.edit', compact('specialities'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $specialities = specialities::findOrFail($id);
        $specialities->name = $request->name;
        $specialities->save();
        Alert::success('EXITO', 'Se ha actualizado la especialidad')->showConfirmButton('OK', '#3085d6'); 
        return redirect()->back();
    }

    public function destroy($id)
    {
        $specialities = specialities::findOrFail($id);
        if ($specialities->delete()) {
            return response()->json(['status'=>'se ha eliminado la especialidad']);
        } 
        

    }
}

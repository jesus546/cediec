<?php

namespace App\Http\Controllers;

use App\Http\Requests\Speciality\StoreRequest;
use App\Http\Requests\Speciality\UpdateRequest;
use App\specialities;


class SpecialitiesController extends Controller
{
   
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
        return redirect('specialities');
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
        return redirect('specialities');
    }

    public function destroy(specialities $specialities)
    {
        
    }
}

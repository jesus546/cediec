<?php

namespace App\Http\Controllers;

use App\specialities;
use Illuminate\Http\Request;

class SpecialitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = specialities::all();
        return view('specialities.index', ['specialities' => $specialities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\specialities  $specialities
     * @return \Illuminate\Http\Response
     */
    public function show(specialities $specialities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\specialities  $specialities
     * @return \Illuminate\Http\Response
     */
    public function edit(specialities $specialities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\specialities  $specialities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, specialities $specialities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\specialities  $specialities
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialities $specialities)
    {
        //
    }
}

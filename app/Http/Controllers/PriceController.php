<?php

namespace App\Http\Controllers;

use App\price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price = price::all();
        return view('precios.precios_index', ['price' => $price]);
    }
    public function create()
    {
        return view('precios.create');
    }

    public function store(Request $request, price $price)
    {
        $price = $price->store($request);
        return redirect()->route('price.index');
    }


    public function show(price $price)
    {
        //
    }

    public function edit(price $price)
    {
        $price = $price;
        return view('precios.edit', compact('price'));
    }

    public function update(Request $request, price $price)
    {
        $price = $price->my_update($request);
        return redirect()->route('price.index');
    }


    public function destroy(price $price)
    {
        //
    }

  
}

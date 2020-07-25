<?php

namespace App\Http\Controllers;

use App\aseguradora;
use App\price;
use App\regime;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        
        return view('precios.create', [
            'regimes' => regime::all()
        ]);
    }

    public function store(Request $request, price $price)
    {
        $price = $price->store($request);
        $price->regime()->attach($request->regime_id);
        Alert::success('EXITO', 'Se ha creado el precio')->showConfirmButton('OK', '#3085d6');
        return redirect()->route('price.index');
    }


    public function show(price $price)
    {
        //
    }

    public function edit(price $price)
    {
        $price = $price;
        return view('precios.edit', compact('price'), [
            'regimes' => regime::all()
        ]);
    }

    public function update(Request $request, price $price)
    {
        $price = $price->my_update($request);
        $price->regime()->attach($request->regime_id);
        Alert::success('EXITO', 'Se ha actualizado el precio')->showConfirmButton('OK', '#3085d6');
        return redirect()->route('price.index');
        
    }


    public function destroy(price $price)
    {
        //
    }

    public function asignar_asegu_price($id)
    {
        $price = price::findOrFail($id);
          return view('precios.asignar_asegu', compact('price'), [
            'aseguradora' => aseguradora::all()
          ]);
    }
    
    public function price_assignment(Request $request, $id)
    {
        $price = price::findOrFail($id);
       
        if ($price->aseguradora()->sync($request->aseguradora_id)){
            Alert::success('EXITO', 'Se ha actualizado')->showConfirmButton('OK', '#3085d6');
            return redirect()->route('price.index');
        }
    }

  
}

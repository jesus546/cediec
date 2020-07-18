<?php

namespace App\Http\Controllers;

use App\aseguradora;
use App\price;
use App\regime;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PriceAseguController extends Controller
{
    public function asignar_asegu_price($id)
    {
        $price = price::findOrFail($id);
          return view('precios.asignar_asegu', compact('price'), [
            'regimes' => regime::all(),
            'aseguradora' => aseguradora::all()
          ]);
    }
    
    public function price_assignment(Request $request, $id)
    {
        $price = price::findOrFail($id);
       

        if ($price->regime()->sync(['regime_id'=>$request->get('regime_id'), 'aseguradora_id'=>$request->get('aseguradora_id')]) ){
            Alert::success('EXITO', 'Se ha actualizado')->showConfirmButton('OK', '#3085d6');
            return redirect()->route('price.index');
        }
    }
}

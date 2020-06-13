<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\departamento;

use App\municipio;
use App\specialities;
use App\tipoIdentificacion;


use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class empleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
   

    public function index()
    {
        $empleados = User::role(['super-admin', 'admisionista', 'doctor'])->get();
        return view('empleados.index', ['empleados' => $empleados]);
    }

  
    protected function create()
    {
        $tipoIdentificacion = tipoIdentificacion::all();
        $departamento = departamento::all();
        $municipio = municipio::all();
       return view('empleados.create', compact('tipoIdentificacion', 'departamento', 'municipio'));

       
     
    }


   
    public function store(Request $request)
    {
        $empleado = new User();
        $empleado->fk_tipoDeidentificacion = $request->fk_tipoDeidentificacion;
        $empleado->identificacion = $request->identificacion;
        $empleado->nombres = $request->nombres;
        $empleado->email = $request->email;
        $empleado->celular = $request->celular;
        $empleado->genero = $request->genero;
        $empleado->zona = $request->zona;
        $empleado->fechaDeNacimiento = $request->fechaDeNacimiento;
        $empleado->password = bcrypt($request->password);
        
        if ($empleado->save()) {
         
         Alert::success('EXITO', 'se ha creado su usuario')->showConfirmButton('OK', '#3085d6');

         return redirect('/empleados');
        }
        
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $tipoIdentificacion = tipoIdentificacion::all();
        $departamento = departamento::all();
        $municipio = municipio::all();
        $empleado = User::findOrFail($id);
        return view('empleados.edit', compact('empleado', 'tipoIdentificacion', 'departamento', 'municipio'));
    }

   
    public function update(Request $request, $id)
    {
        $empleado = User::findOrFail($id);
        $empleado->fk_tipoDeidentificacion = $request->fk_tipoDeidentificacion;
        $empleado->identificacion = $request->identificacion;
        $empleado->nombres = $request->nombres;
        $empleado->email = $request->email;
        $empleado->genero = $request->genero;
        $empleado->zona = $request->zona;
        if ($request->password != null) {
            $empleado->password = $request->password;
        }
        
      
         if ($empleado->save()) {
            
            Alert::success('EXITO', 'Se ha actualizado el usuario')->showConfirmButton('OK', '#3085d6');
            return redirect('/empleados');
           }
    }

   
    public function destroy($id)
    {
        $empleado = User::findOrFail($id);
        
        if ($empleado->delete()) {
            
            return redirect('/empleados');
        } else {
            alert()->error('Oops...', 'No se pudo eliminar el usuario');
        }
        

    }

    public function asignar_speciality($id)
    {
        $empleado = User::findOrFail($id);
          return view('empleados.asignar.asignar_speciality', compact('empleado'), [
            'specialities' => specialities::all()
          ]);
    }

    public function speciality_assignment(Request $request, $id)
    {
        $empleado = User::findOrFail($id);
        $empleado->specialities()->sync($request->specialities);
        return redirect('/empleados');
    }
}

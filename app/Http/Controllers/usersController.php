<?php

namespace App\Http\Controllers;

use App\aseguradora;
use Illuminate\Http\Request;

use App\departamento;
use App\discapacidad;
use App\genero;
use App\grupoEtnico;
use App\Http\Requests\usuario\storeUserRequest;
use App\municipio;
use App\nivelEducativo;
use App\poblacionRiesgo;
use App\religion as AppReligion;
use App\rh;
use App\tipoAseguradora;
use App\tipoIdentificacion;
use App\zona;

use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class usersController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }
   
   

    public function index()
    {
        $users = User::role('User')->get();
        return view('usuarios.index', ['users' => $users]);
    }

  
    protected function create()
    {
        $tipoIdentificacion = tipoIdentificacion::all();
        $departamento = departamento::all();
        $municipio = municipio::all();
        $rh = rh::all();
        $religion = AppReligion::all();
        $discapacidad = discapacidad::all();
        $nivelEducativo = nivelEducativo::all();
        $grupoEtnico = grupoEtnico::all();
        $poblacionRiesgo = poblacionRiesgo::all();
        $tipoAseguradora = tipoAseguradora::all();
        $aseguradora = aseguradora::all();
       return view('usuarios.create', compact('tipoIdentificacion', 
                                               'departamento', 
                                               'municipio', 
                                               'rh', 
                                               'religion', 
                                               'discapacidad',
                                               'nivelEducativo',
                                               'grupoEtnico',
                                               'poblacionRiesgo',
                                               'tipoAseguradora',
                                               'aseguradora'
                                                ));

       
     
    }


   
    public function store(storeUserRequest $request)
    {
        $usuarios = new User();
        $usuarios->$request->all();
        
        if ($usuarios->save()) {
         $usuarios->assignRole('User');
         Alert::success('EXITO', 'se ha creado su usuario')->showConfirmButton('OK', '#3085d6');

         return redirect()->route('usuarios.index');
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
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario', 'tipoIdentificacion', 'genero', 'zona', 'departamento', 'municipio'));
    }

   
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->fk_tipoDeidentificacion = $request->fk_tipoDeidentificacion;
        $usuario->identificacion = $request->identificacion;
        $usuario->nombres = $request->nombres;
        $usuario->email = $request->email;
        $usuario->genero = $request->genero;
        $usuario->zona = $request->zona;
        if ($request->password != null) {
            $usuario->password = $request->password;
        }
        
      
         if ($usuario->save()) {
            $usuario->syncRoles('User');
            Alert::success('EXITO', 'Se ha actualizado el usuario')->showConfirmButton('OK', '#3085d6');
            return redirect()->route('usuarios.index');
           }
    }

   
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        
        if ($usuario->delete()) {
            $usuario->removeRole('User');
            return redirect()->route('usuarios.index');
        } else {
            alert()->error('Oops...', 'No se pudo eliminar el usuario');
        }
        

    }
}

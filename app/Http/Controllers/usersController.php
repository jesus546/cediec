<?php

namespace App\Http\Controllers;

use App\aseguradora;
use App\departamento;
use App\discapacidad;
use App\grupoEtnico;
use App\Http\Requests\usuario\storeUserRequest;
use App\Http\Requests\usuario\updateUserRequest;
use App\nivelEducativo;
use App\poblacionRiesgo;
use App\religion as AppReligion;
use App\rh;
use App\tipoAseguradora;
use App\tipoIdentificacion;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class usersController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }
   
   

    public function index(Request $request)
    {
        if ($request) {
            $query  = trim($request->get('search'));
            $users = User::where('identificacion', 'LIKE', '%'.$query.'%')
                        ->orderBy('id', 'asc')
                        ->role('User')
                        ->get();
            return view('usuarios.index', ['users' => $users, 'search' => $query]);
        }
    }

  
    protected function create()
    {
        $tipoIdentificacion = tipoIdentificacion::all();
        $departamento = departamento::all();
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
        $usuarios->fk_tipoDeidentificacion = $request->fk_tipoDeidentificacion;
        $usuarios->identificacion = $request->identificacion;
        $usuarios->nombres = $request->nombres;
        $usuarios->apellidos = $request->apellidos;
        $usuarios->fk_rh = $request->fk_rh;
        $usuarios->email = $request->email;
        $usuarios->direccion = $request->direccion;
        $usuarios->fk_estadoCivil = $request->fk_estadoCivil;
        $usuarios->telefono = $request->telefono;
        $usuarios->celular = $request->celular;
        $usuarios->fk_departamento= $request->fk_departamento;
        $usuarios->fk_municipio = $request->fk_municipio;
        $usuarios->genero = $request->genero;
        $usuarios->zona = $request->zona;
        $usuarios->password = $request->password;
        $usuarios->fechaDeNacimiento = $request->fechaDeNacimiento;
        $usuarios->nombre_del_responsable = $request->nombre_del_responsable;
        $usuarios->telefono_r = $request->telefono_r;
        $usuarios->fk_parentezco = $request->fk_parentezco;
        $usuarios->fk_religion = $request->fk_religion;
        $usuarios->fk_nivelEducativo = $request->fk_nivelEducativo;
        $usuarios->fk_grupoEtnico = $request->fk_grupoEtnico;
        $usuarios->fk_poblacionRiesgo = $request->fk_poblacionRiesgo;
        $usuarios->fk_tipoAseguradora = $request->fk_tipoAseguradora;
        $usuarios->fk_aseguradora = $request->fk_aseguradora;
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
        $usuario = User::findOrFail($id);
        $tipoIdentificacion = tipoIdentificacion::all();
        $departamento = departamento::all();
        $rh = rh::all();
        $religion = AppReligion::all();
        $discapacidad = discapacidad::all();
        $nivelEducativo = nivelEducativo::all();
        $grupoEtnico = grupoEtnico::all();
        $poblacionRiesgo = poblacionRiesgo::all();
        $tipoAseguradora = tipoAseguradora::all();
        $aseguradora = aseguradora::all();
        return view('usuarios.edit', compact('usuario', 
                                             'tipoIdentificacion', 
                                             'departamento', 
                                             'rh', 
                                             'religion', 
                                            'discapacidad',
                                             'nivelEducativo',
                                             'grupoEtnico',
                                             'poblacionRiesgo',
                                             'tipoAseguradora',
                                             'aseguradora'));
    }

   
    public function update(updateUserRequest $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->fk_tipoDeidentificacion = $request->fk_tipoDeidentificacion;
        $usuario->identificacion = $request->identificacion;
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->fk_rh = $request->fk_rh;
        $usuario->email = $request->email;
        $usuario->direccion = $request->direccion;
        $usuario->fk_estadoCivil = $request->fk_estadoCivil;
        $usuario->telefono = $request->telefono;
        $usuario->celular = $request->celular;
        $usuario->fk_departamento= $request->fk_departamento;
        $usuario->fk_municipio = $request->fk_municipio;
        $usuario->genero = $request->genero;
        $usuario->zona = $request->zona;
        $usuario->fechaDeNacimiento = $request->fechaDeNacimiento;
        $usuario->nombre_del_responsable = $request->nombre_del_responsable;
        $usuario->telefono_r = $request->telefono_r;
        $usuario->fk_parentezco = $request->fk_parentezco;
        $usuario->fk_religion = $request->fk_religion;
        $usuario->fk_nivelEducativo = $request->fk_nivelEducativo;
        $usuario->fk_grupoEtnico = $request->fk_grupoEtnico;
        $usuario->fk_poblacionRiesgo = $request->fk_poblacionRiesgo;
        $usuario->fk_tipoAseguradora = $request->fk_tipoAseguradora;
        $usuario->fk_aseguradora = $request->fk_aseguradora;
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

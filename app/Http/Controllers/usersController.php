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
use App\regime;
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
                        ->orderBy('identificacion', 'asc')
                        ->role('User')
                        ->paginate(10);
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
        $regimes = regime::all();
       return view('usuarios.create', compact('tipoIdentificacion', 
                                               'departamento', 
                                               'rh', 
                                               'religion', 
                                               'discapacidad',
                                               'nivelEducativo',
                                               'grupoEtnico',
                                               'poblacionRiesgo',
                                               'tipoAseguradora',
                                               'aseguradora',
                                               'regimes'
                                                ));

       
     
    }


   
    public function store(storeUserRequest $request, User $usuarios)
    {
        $usuarios = $usuarios->store_user($request);
         return redirect()->route('usuarios.index');
        
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
        $regimes = regime::all();
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
                                             'aseguradora',
                                             'regimes'));
    }

   
    public function update(updateUserRequest $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->update_user($request);
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
            return response()->json(['status'=>'se ha eliminado el precio']);
        } 
        
    }
}

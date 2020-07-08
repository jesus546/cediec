<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\departamento;
use App\Http\Requests\usuario_empleado\user_EmplStore;
use App\rh;
use App\specialities;
use App\tipoIdentificacion;
use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class empleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
   

    public function index(Request $request)
    {
        
        if ($request) {
            $query  = trim($request->get('search'));
            $empleados = User::where('identificacion', 'LIKE', '%'.$query.'%')
                        ->orderBy('id', 'asc')
                        ->role(['super-admin', 'Admisionista', 'Doctor', 'Administrador'])
                        ->get();
            return view('empleados.index', ['empleados' => $empleados, 'search' => $query]);
        }
        
        
    }

  
    protected function create()
    {
        $tipoIdentificacion = tipoIdentificacion::all();
        $departamento = departamento::all();
        $rh = rh::all();
        $roles = ModelsRole::all();
       return view('empleados.create', compact('tipoIdentificacion', 'departamento', 'roles', 'rh'));

       
     
    }


   
    public function store(Request $request)
    {

        $empleados = new AuthUser();
        $empleados->fk_tipoDeidentificacion = $request->input('fk_tipoDeidentificacion');
        $empleados->identificacion = $request->input('identificacion');
        $empleados->nombres = $request->input('nombres');
        $empleados->apellidos = $request->input('apellidos');
        $empleados->fk_rh = $request->input('fk_rh');
        $empleados->email = $request->input('email');
        $empleados->direccion = $request->input('direccion');
        $empleados->fk_estadoCivil = $request->input('fk_estadoCivil');
        $empleados->telefono = $request->input('telefono');
        $empleados->celular = $request->input('celular');
        $empleados->fk_departamento= $request->input('fk_departamento');
        $empleados->fk_municipio = $request->input('fk_municipio');
        $empleados->genero = $request->input('genero');
        $empleados->zona = $request->input('zona');
        $empleados->fechaDeNacimiento = $request->input('fechaDeNacimiento');
        $empleados->password = $request->input('password');
        if ($empleados->save()) {
         $empleados->syncRoles($request->input('roles'));
         Alert::success('EXITO', 'se ha creado su usuario')->showConfirmButton('OK', '#3085d6');
         return redirect()->route('empleados.index');
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
        $rh = rh::all();
        $empleado = User::findOrFail($id);
        $roles = ModelsRole::all();
        return view('empleados.edit', compact('empleado', 'tipoIdentificacion', 'departamento', 'roles', 'rh'));
    }

   
    public function update(Request $request, $id)
    {
        $empleado = User::findOrFail($id);
        $empleado->fk_tipoDeidentificacion = $request->fk_tipoDeidentificacion;
        $empleado->identificacion = $request->identificacion;
        $empleado->nombres = $request->nombres;
        $empleado->apellidos = $request->apellidos;
        $empleado->fk_rh = $request->fk_rh;
        $empleado->email = $request->email;
        $empleado->fk_municipio = $request->fk_municipio;
        $empleado->direccion = $request->direccion;
        $empleado->fk_estadoCivil = $request->fk_estadoCivil;
        $empleado->telefono = $request->telefono;
        $empleado->celular = $request->celular;
        $empleado->fk_departamento= $request->fk_departamento;
        $empleado->genero = $request->genero;
        $empleado->zona = $request->zona;
        $empleado->fechaDeNacimiento = $request->fechaDeNacimiento;
        if ($request->password != null) {
            $empleado->password = $request->password;
        }
        
      
        if ($empleado->save()) {
            $empleado->syncRoles($request->roles);
            Alert::success('EXITO', 'Se ha actualizado el usuario')->showConfirmButton('OK', '#3085d6');
            return redirect()->route('empleados.index');
        }
        
    }

   
    public function destroy($id)
    {
        $empleado = User::findOrFail($id);
        
        if ($empleado->delete()) {
            $empleado->revokePermissionTo(Permission::all());
            $empleado->roles()->detach();
            return redirect()->route('empleados.index');
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
        if ($empleado->specialities()->sync($request->specialities)) {
            Alert::success('EXITO', 'Se ha actualizado las especialdades')->showConfirmButton('OK', '#3085d6');
            return redirect()->route('empleados.index');
        }
    }

    public function asignar_permission($id)
    {
        $empleado = User::findOrFail($id);
        $permissions = Permission::all();
          return view('empleados.asignar.asignar_permission', compact('empleado', 'permissions'));
    }

    public function permission_assignment(Request $request, $id)
    {
        $empleado = User::findOrFail($id);
        if ($empleado->syncPermissions($request->permissions)) {
        Alert::success('EXITO', 'Se han actualizado los permisos')->showConfirmButton('OK', '#3085d6');
        return redirect()->route('empleados.index');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\departamento;
use App\Http\Requests\usuario\user_EmplStore;
use App\Http\Requests\usuario\user_EmplUpdate;
use App\Http\Requests\usuario_empleado\user_EmplStore as Usuario_empleadoUser_EmplStore;
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
   
   

    public function index(Request $request, User $empleados)
    {
        $this->authorize('listar_empleado', $empleados);
        if ($request) {
            $query  = trim($request->get('search'));
            $empleados = User::where('identificacion', 'LIKE', '%'.$query.'%')
                        ->orderBy('id', 'asc')
                        ->role(['super-admin', 'Admisionista', 'Doctor', 'Administrador'])
                        ->paginate(10);
            return view('empleados.index', ['empleados' => $empleados, 'search' => $query]);
        }
        
        
    }

  
    protected function create(User $empleados)
    {
        $this->authorize('registrar_empleado', $empleados);
        $tipoIdentificacion = tipoIdentificacion::all();
        $departamento = departamento::all();
        $rh = rh::all();
        $roles = ModelsRole::all();
       return view('empleados.create', compact('tipoIdentificacion', 'departamento', 'roles', 'rh'));

       
     
    }


   
    public function store(user_emplStore $request, User $empleados)
    {
        $this->authorize('registrar_empleado', $empleados);
        $empleados = $empleados->store_empl($request);
         return redirect()->route('empleados.index');
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

   
    public function update(user_EmplUpdate $request, $id)
    {
        $empleado = User::findOrFail($id);
       $empleado->update_user($request);
        if ($request->password != null) {
            $empleado->password = $request->password;
        }
        
      
        if ($empleado->save()) {
            $empleado->syncRoles($request->roles);
            Alert::success('EXITO', 'Se ha actualizado el usuario')->showConfirmButton('OK', '#3085d6'); 
            return redirect()->back();
        }
        
    }

   
    public function destroy(User $empleado)
    {
        
        if ($empleado->delete()) {
            $empleado->revokePermissionTo(Permission::all());
            $empleado->roles()->detach();
            $empleado->specialities()->detach();
            return response()->json(['status'=>'se ha eliminado el precio']);
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
            return redirect()->back();
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
        return redirect()->back();
        }
    }

 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\departamento;
use App\genero;
use App\municipio;
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
        $genero = genero::all();
        $zona = zona::all();
        $departamento = departamento::all();
        $municipio = municipio::all();
       return view('usuarios.create', compact('tipoIdentificacion', 'genero', 'zona', 'departamento', 'municipio'));

       
     
    }


   
    public function store(Request $request)
    {
        $usuarios = new User();
        $usuarios->fk_tipoDeidentificacion = $request->fk_tipoDeidentificacion;
        $usuarios->identificacion = $request->identificacion;
        $usuarios->nombres = $request->nombres;
        $usuarios->email = $request->email;
        $usuarios->celular = $request->celular;
        $usuarios->fechaDeNacimiento = $request->fechaDeNacimiento;
        $usuarios->password = bcrypt($request->password);
        
        if ($usuarios->save()) {
         $usuarios->assignRole('User');
         Alert::success('EXITO', 'se ha creado su usuario')->showConfirmButton('OK', '#3085d6');

         return redirect('/usuarios');
        }
        
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $tipoIdentificacion = tipoIdentificacion::all();
        $genero = genero::all();
        $zona = zona::all();
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
        if ($request->password != null) {
            $usuario->password = $request->password;
        }
        
      
         if ($usuario->save()) {
            $usuario->syncRoles('User');
            Alert::success('EXITO', 'Se ha actualizado el usuario')->showConfirmButton('OK', '#3085d6');
            return redirect('/usuarios');
           }
    }

   
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        
        if ($usuario->delete()) {
            $usuario->removeRole('User');
            return redirect('/usuarios');
        } else {
            alert()->error('Oops...', 'No se pudo eliminar el usuario');
        }
        

    }
}

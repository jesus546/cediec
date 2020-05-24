<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\departamento;
use App\genero;
use App\municipio;
use App\tipoIdentificacion;
use App\zona;

use App\User;


class usersController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }
   
   

    public function index()
    {
        $users = User::all();
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
        $usuarios->identificacion = $request->identificacion;
        $usuarios->nombres = $request->nombres;
        $usuarios->email = $request->email;
        $usuarios->password = bcrypt($request->password);
        
        if ($usuarios->save()) {
         $usuarios->assignRole('User');

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
        $usuario->identificacion = $request->identificacion;
        $usuario->nombres = $request->nombres;
        $usuario->email = $request->email;
        if ($request->password != null) {
            $usuario->password = $request->password;
        }
        
      
         if ($usuario->save()) {
            $usuario->syncRoles('User');
   
            return redirect('/usuarios');
           }
    }

   
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->removeRole('User');
        
        if ($usuario->delete()) {
            return redirect('/usuarios');
        } else {
            return response()->json([
                'mensaje' => 'error al eliminar usuario'
            ]);
        }
        

    }
}

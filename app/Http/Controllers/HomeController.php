<?php

namespace App\Http\Controllers;

use App\Http\Requests\usuario\ChangePassword;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role as ModelsRole;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
    
    public function profile()
    {
        return view('perfil');
    }

    public function password_update_view()
    {
        return view('cambiarContraseña');
    }

   public function password_update(ChangePassword $request)
   {
     $request->user()->password = $request->password;
     $request->user()->save();
     Alert::success('EXITO', 'Se ha actualizado su contraseña')->showConfirmButton('OK', '#3085d6');
     return redirect()->back();
   }
}

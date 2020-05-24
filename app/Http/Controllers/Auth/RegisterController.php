<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fk_tipoDeidentificacion' => ['required' ],
            'fk_genero' => ['required'],
            'identificacion' => ['required', 'string', 'max:10'],
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:20'],
            'celular' => ['required', 'string', 'max:10'],
            'fk_departamento' => ['required'],
            'fk_municipio' => ['required'],
            'fechaDeNacimiento' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'fk_zona' =>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    
        return User::create([
            'fk_tipoDeidentificacion' => $data ['fk_tipoDeidentificacion'],
            'fk_genero' => $data ['fk_genero'],
            'identificacion' => $data['identificacion'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'fk_municipio' => $data ['fk_municipio'],
            'fk_departamento' => $data['fk_departamento'],
            'direccion' => $data['direccion'],
            'celular' => $data['celular'],
            'fk_zona' => $data['fk_zona'],
            'fechaDeNacimiento' => $data['fechaDeNacimiento'],
            'password' => Hash::make($data['password']),
          
        ]);
     
    }

   
}

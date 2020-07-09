<?php

namespace App\Http\Requests\usuario_empleado;

use Illuminate\Foundation\Http\FormRequest;

class user_EmplUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
        'identificacion' => 'unique:users|min:10|string',
        'nombres' => 'max:60|string',
        'apellidos' => 'max:60|string' , 
        'telefono' => 'max:10|string',
        'email'=> 'unique:users, email|max:255|string|email',
        'direccion' => 'max:30|string',
        'password' => 'min:10|string', 
        'celular' => 'max:10|string', 
        'fechaDeNacimiento'=> 'date',

        ];
    }

    public function messages()
    {
        return [
        'identificacion.unique' => 'ya se encuentra en la base de datos',
        'identificacion.min' => 'minimo son 10 caracteres',
        'nombres.max' => 'maxaimo son 60 caracteres',
        'apellidos.max' => 'maximo son 60 caracteres',
        'telefono.min' => 'minimo son 10 caracteres',
        'email.unique' => 'ya se encuentra en la base de datos',
        'email.email' => 'este campo tiene que ser email',
        'direccion.max' => 'maximo son 30 caracteres',
        'password.min' => 'minimo son 10 caracteres',
        'celular.max' => 'maximo son 10 caracteres',
        ];
    }
}

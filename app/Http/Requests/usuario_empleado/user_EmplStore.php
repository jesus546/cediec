<?php

namespace App\Http\Requests\usuario_empleado;

use Illuminate\Foundation\Http\FormRequest;

class user_EmplStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'fk_tipoDeidentificacion' => 'required',
        'identificacion' => 'required|unique:users|min:10|string',
        'nombres' => 'required|max:60|string',
        'apellidos' => 'required|max:60|string' , 
        'telefono' => 'required|max:10|string',
        'email'=> 'required|unique:users|max:255|string|email',
        'direccion' => 'required|max:30|string',
        'genero' => 'required',
        'zona'=> 'required',
        'password' => 'required|min:10|string', 
        'celular' => 'required|max:10|string', 
        'fechaDeNacimiento'=> 'required|date',
        'fk_rh' => 'required',
        'fk_estadoCivil'=> 'required',
        'roles'=> 'required',
        'fk_departamento'=> 'required',
        'fk_municipio'=> 'required',
   
        ];
    }

    public function messages()
    {
        return [
        'fk_tipoDeidentificacion.required' => 'este campo es requerido',
        'identificacion.unique' => 'ya se encuentra en la base de datos',
        'identificacion.required' => 'este campo es requerido',
        'identificacion.min' => 'minimo son 10 caracteres',
        'nombres.required' => 'este campo es requerido',
        'nombres.max' => 'maxaimo son 60 caracteres',
        'apellidos.required' => 'este campo es requerido',
        'apellidos.max' => 'maximo son 60 caracteres',
        'telefono.required' => 'este campo es requerido',
        'telefono.min' => 'minimo son 10 caracteres',
        'email.required' => 'este campo es requerido',
        'email.unique' => 'ya se encuentra en la base de datos',
        'email.email' => 'este campo tiene que ser email',
        'direccion.required' => 'este campo es requerido',
        'direccion.max' => 'maximo son 30 caracteres',
        'genero.required' => 'este campo es requerido',
        'zona.required' => 'este campo es requerido',
        'password.required' => 'este campo es requerido',
        'password.min' => 'minimo son 10 caracteres',
        'celular.required' => 'este campo es requerido',
        'celular.max' => 'maximo son 10 caracteres',
        'fechaDeNacimiento.required' => 'este campo es requerido',
        'fk_estadoCivil.required' => 'este campo es requerido',
        'roles.required' => 'este campo es requerido',
        'fk_rH.required' => 'este campo es requerido',
        'fk_departamento.required' => 'este campo es requerido',
        'fk_municipio.required' => 'este campo es requerido',
        ];
    }
}

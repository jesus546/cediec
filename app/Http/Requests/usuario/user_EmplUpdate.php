<?php

namespace App\Http\Requests\usuario;

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
        'fk_tipoDeidentificacion' => 'integer|nullable',
        'identificacion' => 'unique:users,identificacion, '.$this->route('empleado').'|min:10|integer',
        'nombres' => 'max:60|string|nullable',
        'apellidos' => 'max:60|string|nullable' ,
        'fk_rH' => 'integer|nullable', 
        'genero' => 'string|nullable',
        'fk_estadoCivil'=> 'string|nullable',
        'fechaDeNacimiento'=> 'date|nullable',
        'telefono' => 'integer|min:10|nullable',
        'celular' => 'integer|min:10|nullable', 
        'email'=> 'unique:users,email,'.$this->route('empleado').'|max:255|string|email',
        'password' => 'min:8|max:10|nullable',
        'direccion' => 'max:30|string|nullable',
        'zona'=> 'string|nullable',
        'fk_departamento'=> 'integer|nullable',
        'fk_municipio'=> 'integer|nullable',
        ];
    }

    public function messages()
    {
        return [
        'identificacion.unique' => 'ya se encuentra en la base de datos',
        'identificacion.min' => 'minimo son 10 caracteres',
        'identificacion.integer' => 'tiene que ser numerico',
        'nombres.max' => 'maximo son 60 caracteres',
        'telefono.integer' => 'tiene que ser numerico',
        'celular.integer' => 'tiene que ser numerico',
        'apellidos.max' => 'maximo son 60 caracteres',
        'email.unique' => 'ya se encuentra en la base de datos',
        'email.email' => 'este campo tiene que ser email',
        'direccion.max' => 'maximo son 30 caracteres',
        'fk_rH.integer' => 'seleccion este campo',
        'fk_departamento.integer'=> 'seleccione el departamento',
        'fk_municipio.integer'=> 'seleccione el municipio',

        ];
    }
}

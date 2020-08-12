<?php

namespace App\Http\Requests\usuario;

use Illuminate\Foundation\Http\FormRequest;

class storeUserRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }



    public function rules()
    {
        return [
        'fk_tipoDeidentificacion' => 'required|integer',
        'identificacion' => 'required|unique:users|min:10|integer',
        'nombres' => 'required|max:60|string',
        'apellidos' => 'required|max:60|string' , 
        'telefono' => 'nullable|integer',
        'email'=> 'required|unique:users|max:255|string|email',
        'direccion' => 'required|max:30|string',
        'genero' => 'string|required',
        'zona'=> 'string|required',
        'password' => 'required|min:10|string', 
        'celular' => 'required|integer', 
        'fechaDeNacimiento'=> 'required|date',
        'fk_rH' => 'required|integer',
        'fk_estadoCivil'=> 'required',
        'fk_departamento'=> 'required|integer',
        'fk_municipio'=> 'required|integer',
        'ocupacion'=> 'required|string',
        'nombre_del_responsable'=> 'required|max:60|string',
        'telefono_r' => 'required|integer',
        'fk_parentezco' => 'string|required',
        'fk_estadoCivil'=> 'string|required',
        'fk_regime' => 'required|integer',
        'fk_religion' => 'required|integer',
        'fk_discapacidad'=> 'required|integer',
        'fk_nivelEducativo'=> 'required|integer',
        'fk_grupoEtnico'=> 'required|integer',
        'fk_tipoAseguradora'=> 'required|integer',
        'fk_aseguradora'=> 'required|integer',
        'fk_poblacionRiesgo'=> 'required|integer',
   
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
        'fechaDeNacimiento.required' => 'este campo es requerido',
        'fk_estadoCivil.required' => 'este campo es requerido',
        'fk_municipio.required' => 'este campo es requerido',
        'fk_parentezco.required' => 'este campo es requerido',
        'fk_estadoCivil.required' => 'este campo es requerido',
        'fk_rH.required' => 'este campo es requerido',
        'fk_religion.required' => 'este campo es requerido',
        'fk_discapacidad.required' => 'este campo es requerido',
        'fk_nivelEducativo.required' => 'este campo es requerido',
        'fk_grupoEtnico.required' => 'este campo es requerido',
        'fk_departamento.required' => 'este campo es requerido',
        'fk_tipoAseguradora.required' => 'este campo es requerido',
        'fk_aseguradora.required' => 'este campo es requerido',
        'fk_poblacionRiesgo.required' => 'este campo es requerido',
        ];
    }
}

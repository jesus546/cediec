<?php

namespace App\Http\Requests\usuario;

use Illuminate\Foundation\Http\FormRequest;

class storeUserRequest extends FormRequest
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
        'email'=> 'required|max:255|string|email',
        'direccion' => 'required|max:30|string',
        'genero' => 'required',
        'zona'=> 'required',
        'password' => 'required|min:10|string', 
        'celular' => 'required|max:10|string', 
        'fechaDeNacimiento'=> 'required|date',
        'ocupacion'=> 'required|max:60|string',
        'nombre_del_responsable'=> 'required|max:60|string',
        'telefono_r' => 'required|min:10|string',
        'fk_parentezco' => 'required',
        'fk_estadoCivil'=> 'required',
        'fk_rH'=> 'required',
        'fk_religion' => 'required',
        'fk_discapacidad'=> 'required',
        'fk_nivelEducativo'=> 'required',
        'fk_grupoEtnico'=> 'required',
        'fk_departamento'=> 'required',
        'fk_municipio'=> 'required',
        'fk_tipoAseguradora'=> 'required',
        'fk_aseguradora'=> 'required',
        'fk_poblacionRiesgo'=> 'required',
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
        'fechaDeNacimiento.required' => 'este campo es requerido',
        'ocupacion.required' => 'este campo es requerido',
        'ocupacion.max' => 'maximo son 60 caracteres',
        'nombre_del_responsable.required' => 'este campo es requerido',
        'nombre_del_responsable.max' => 'maximo son 60 caracteres',
        'telefono_r.required' => 'este campo es requerido',
        'telefono_r.min' => 'minimo son 10 caracteres',
        'fk_parentezco.required' => 'este campo es requerido',
        'fk_estadoCivil.required' => 'este campo es requerido',
        'fk_rH.required' => 'este campo es requerido',
        'fk_religion.required' => 'este campo es requerido',
        'fk_discapacidad.required' => 'este campo es requerido',
        'fk_nivelEducativo.required' => 'este campo es requerido',
        'fk_grupoEtnico.required' => 'este campo es requerido',
        'fk_departamento.required' => 'este campo es requerido',
        'fk_municipio.required' => 'este campo es requerido',
        'fk_tipoAseguradora.required' => 'este campo es requerido',
        'fk_aseguradora.required' => 'este campo es requerido',
        'fk_poblacionRiesgo.required' => 'este campo es requerido',
        ];
    }
}

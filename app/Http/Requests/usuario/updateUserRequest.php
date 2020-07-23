<?php

namespace App\Http\Requests\usuario;

use Illuminate\Foundation\Http\FormRequest;

class updateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
        'fk_tipoDeidentificacion' => 'integer',
        'identificacion' => 'unique:users,identificacion, '.$this->route('usuario').'|min:10|integer',
        'nombres' => 'max:60|string',
        'apellidos' => 'max:60|string' , 
        'telefono' => 'integer',
        'email'=> 'unique:users,email,'.$this->route('usuario').'|max:255|string|email',
        'direccion' => 'max:30|string',
        'celular' => 'integer', 
        'fechaDeNacimiento'=> 'date',
        'ocupacion'=> 'max:60|string',
        'nombre_del_responsable'=> 'max:60|string',
        'telefono_r' => 'integer',
        'fk_rH' => 'integer',
        'fk_departamento'=> 'integer',
        'fk_municipio'=> 'integer',
        'fk_parentezco' => 'string',
        'fk_estadoCivil'=> 'string',
        'fk_regime' => 'integer',
        'fk_religion' => 'integer',
        'fk_discapacidad'=> 'integer',
        'fk_nivelEducativo'=> 'integer',
        'fk_grupoEtnico'=> 'integer',
        'fk_tipoAseguradora'=> 'integer',
        'fk_aseguradora'=> 'integer',
        'fk_poblacionRiesgo'=> 'integer',
        ];
    }

    public function messages()
    {
        return [

        'identificacion.unique' => 'ya se encuentra en la base de datos',
        'identificacion.min' => 'minimo son 10 caracteres',
        'nombres.max' => 'maximo son 60 caracteres',
        'apellidos.max' => 'maximo son 60 caracteres',
        'email.unique' => 'ya se encuentra en la base de datos',
        'email.email' => 'este campo tiene que ser email',
        'direccion.max' => 'maximo son 30 caracteres',
        'password.min' => 'minimo son 10 caracteres',
        'ocupacion.max' => 'maximo son 60 caracteres',
        'nombre_del_responsable.max' => 'maximo son 60 caracteres',
        
        ];
    }
}

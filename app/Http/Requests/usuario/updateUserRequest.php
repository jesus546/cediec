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
        'fk_tipoDeidentificacion' => 'integer|nullable',
        'identificacion' => 'unique:users,identificacion, '.$this->route('usuario').'|min:10|integer',
        'nombres' => 'max:60|string|nullable',
        'apellidos' => 'max:60|string|nullable' , 
        'fk_rH' => 'integer|nullable',
        'genero' => 'string|nullable',
        'fk_estadoCivil' => 'string|nullable',
        'fechaDeNacimiento'=> 'date|nullable',
        'telefono' => 'integer|min:10|nullable',
        'celular' => 'integer|min:10|nullable', 
        'email'=> 'unique:users,email,'.$this->route('usuario').'|max:255|string|email',
        'password' => 'min:8|max:10|nullable',
        'direccion' => 'max:30|string|nullable',
        'zona' => 'string|nullable',
        'fk_departamento'=> 'integer|nullable',
        'fk_municipio'=> 'integer|nullable',
        'ocupacion' => 'string|max:60|nullable',
        'nombre_del_responsable' => 'string|max:60|nullable',
        'telefono_r' => 'integer|min:10|nullable',
        'fk_parentezco' => 'string|nullable',
        'fk_religion' => 'integer|nullable',
        'fk_discapacidad' => 'integer|nullable',
        'fk_nivelEducativo' => 'integer|nullable',
        'fk_grupoEtnico' => 'integer|nullable',
        'fk_poblacionRiesgo' => 'integer|nullable',
        'fk_regime' => 'integer|nullable',
        'fk_tipoAseguradora' => 'integer|nullable',
        'fk_aseguradora' => 'integer|nullable'
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

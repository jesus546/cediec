<?php

namespace App\Http\Requests\usuario;

use Illuminate\Foundation\Http\FormRequest;

class registerUser extends FormRequest
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
            'fk_tipoDeidentificacion' => ['required','integer' ],
            'genero' => ['required', 'string'],
            'identificacion' => ['required', 'integer', 'unique:users', 'min:10'],
            'nombres' => ['required', 'string', 'max:60'],
            'apellidos' => ['required', 'string', 'max:60'],
            'direccion' => ['required', 'string', 'max:30'],
            'celular' => ['required', 'integer', 'min:10'],
            'fk_departamento' => ['required','integer'],
            'fk_municipio' => ['required','integer'],
            'fechaDeNacimiento' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','max:10', 'confirmed'],
            'zona' =>['required', 'string'],
        ];
    }
    public function messages()
   {
    return [
        'fk_tipoDeidentificacion.required' => 'Este campo es requerido',
        'fk_tipoDeidentificacion.integer' => 'Selecciona este campo',
        'genero.required' => 'Este campo es requerido',
        'genero.string' => 'selecciona este campo',
        'nombres.required' => 'Este campo es requerido',
        'nombres.string' => 'Este campo es tipo texto',
        'nombres.max' => 'maximo 60 caracteres',
        'apellidos.required' => 'Este campo es requerido',
        'apellidos.string' => 'Este campo es tipo texto',
        'apellidos.max' => 'maximo 60 caracteres',
        'celular.required' => 'Este campo es requerido',
        'celular.integer' => 'Este campo debe ser numerico',
        'celular.min' => 'minimo 10 caracteres',
        'direccion.required' => 'Este campo es requerido',
        'direccion.string' => 'Este campo es tipo texto',
        'direccion.max' => 'maximo 30 caracteres',
        'identificacion.required' => 'Este campo es requerido',
        'identificacion.integer' => 'Este campo debe ser numerico',
        'identificacion.unique' => 'Este dato ya se encuentra en nuestra base de datos',
        'identificacion.max' => 'maximo 10 caracteres',
        'identificacion.min' => 'minimo 8 caracteres',
        'fk_departamento.required' => 'Este campo es requerido',
        'fk_departamento.integer' => 'Selecciona este campo',
        'fk_municipio.required' => 'Este campo es requerido',
        'fk_municipio.integer' => 'Selecciona este campo',
        'zona.required' => 'Este campo es requerido',
        'zona.integer' => 'Selecciona este campo',
        'fechaDeNacimiento.date' => 'Este campo es de fecha',
        'password.required' => 'Este campo es requerido',
        'password.string' => 'Este campo es tipo texto',
        'password.max' => 'maximo 10 caracteres',
        'password.min' => 'minimo 8 caracteres',
        'email.required' => 'Este campo es requerido',
        'email.string' => 'Este campo es tipo texto',
        'email.email' => 'este campo es tipo email',
        'email.unique' => 'Este dato ya se encuentra en nuestra base de datos',
        'email.max' => 'maximo 255 caracteres',
        
    ];
}
}

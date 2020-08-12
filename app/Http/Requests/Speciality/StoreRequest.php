<?php

namespace App\Http\Requests\Speciality;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:specialities|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'el campo es requerido',
            'name.unique' => 'el nombre ya esta en uso',
            'name.max' => 'el numero maximo de caracteres es de 255'
        ];
    }

}


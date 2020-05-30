<?php

namespace App\Http\Requests\role;

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
            'name' => 'required|unique:roles|string|max:80',
            'description' => 'required|string|max:80'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'el campo nombre es requerido',
            'name.unique' => 'ya se encuentra en nuestra base de datos',
            'name.max:80' => 'maximo son 80 caracteres',
            'description.required' => 'el campo descripcion es requerido',
            'description.max:80' => 'maximo son 80 caracteres'
        ];
    }
   
}

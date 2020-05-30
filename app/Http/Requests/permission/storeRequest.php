<?php

namespace App\Http\Requests\permission;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
            'name' => 'required|unique:permissions|string|max:80',
            'description' => 'required|string|max:80',
            'roles_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'el campo nombre es requerido',
            'name.unique' => 'ya se encuentra en nuestra base de datos',
            'name.max:80' => 'maximo son 80 caracteres',
            'description.required' => 'el campo descripcion es requerido',
            'description.max:80' => 'maximo son 80 caracteres',
            'roles_id.required' => 'el campo rol es requerido',
            'roles_id.numeric' => 'el campo debe ser numerico'
        ];
    }
    
}

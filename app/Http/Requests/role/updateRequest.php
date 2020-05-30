<?php

namespace App\Http\Requests\role;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
            'name' => 'unique:roles,name,' . $this->route('role')->id . '|string|max:80',
            'description' => 'string|max:80'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'ya se encuentra en nuestra base de datos',
            'name.max:80' => 'maximo son 80 caracteres',
            'description.max:80' => 'maximo son 80 caracteres'
        ];
    }
}

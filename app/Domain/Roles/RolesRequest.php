<?php

namespace App\Domain\Roles;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $uniqueVerification = $this->request->has('id') ? ',name,' . $this->request->get('id') : '';

        return [
            'name'          => 'required|min:3|max:255|unique:roles' . $uniqueVerification,
            'display_name'  => 'min:3|max:255',
            'description'   => 'min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'O campo nome é obrigatório.',
            'name.min'          => 'O campo nome deverá conter no mínimo :min caracteres.',
            'name.max'          => 'O campo nome não deverá conter mais de :max caracteres.',
            'name.unique'       => 'O valor indicado para o campo nome já se encontra utilizado.',

            'display_name.min'  => 'O campo nome de exibição deverá conter no mínimo :min caracteres.',
            'display_name.max'  => 'O campo nome de exibição não deverá conter mais de :max caracteres.',

            'description.min'   => 'O campo descrição deverá conter no mínimo :min caracteres.',
            'description.max'   => 'O campo descrição não deverá conter mais de :max caracteres.',
        ];
    }

    protected function validationData()
    {
        $this->merge(['name' => str_slug($this->request->get('name'))]);

        return $this->all();
    }
}
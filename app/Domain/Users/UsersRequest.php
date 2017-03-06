<?php

namespace App\Domain\Users;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $uniqueVerification = $this->request->has('id') ? ',email,' . $this->request->get('id') : '';

        return [
            'name'  => 'required|min:3|max:255',
            'email' => 'required|email|min:5|max:255|unique:users' . $uniqueVerification,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min'      => 'O campo nome deverá conter no mínimo :min caracteres.',
            'name.max'      => 'O campo nome não deverá conter mais de :max caracteres.',

            'email.unique'  => 'O valor indicado para o campo email já se encontra utilizado.',
//            'email.email'   => '',
            'email.min'     => 'O campo e-mail deverá conter no mínimo :min caracteres.',
            'email.max'     => 'O campo e-mail não deverá conter mais de :max caracteres.',
        ];
    }

    public function validationData()
    {
        $this->merge(['activated' => $this->request->has('activated')]);

        return $this->all();
    }
}

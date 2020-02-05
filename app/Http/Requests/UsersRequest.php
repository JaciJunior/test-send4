<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;


class UsersRequest extends FormRequest
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
            'password' => 'required|max:255',
            'email' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Campo Password é obrigatório!',
            'email.required' => 'Campo E-Mail é obrigatório!',
        ];
    }
}

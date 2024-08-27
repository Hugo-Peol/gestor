<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'usuario' => 'required|email',
            'senha' => 'required|string'
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'usuario.required' => 'O campo e-mail é obrigatório.',
            'usuario.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.string' => 'O campo senha deve ser uma string.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFornecedorRequest extends FormRequest
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
            'nome' => 'required|min:3|max:40',
            'site' => 'required',
            'uf' => 'required|min:2|max:2',
            'email' => 'nullable|email'
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
            'nome.required' => 'O campo nome deve ser preenchido.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'site.required' => 'O campo site deve ser preenchido.',
            'uf.required' => 'O campo UF deve ser preenchido.',
            'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres.',
            'uf.max' => 'O campo UF deve ter no máximo 2 caracteres.',
            'email.email' => 'O campo e-mail não foi preenchido corretamente.'
        ];
    }
}

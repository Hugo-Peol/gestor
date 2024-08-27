<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Retorne true se o usuário estiver autorizado a fazer a requisição
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
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'nullable|email',
            'motivo_contatos_id' => 'required|exists:motivo_contatos,id',
            'mensagem' => 'required|max:2000'
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
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'nome.unique' => 'O nome informado já está em uso.',
            'telefone.required' => 'O campo telefone deve ser preenchido.',
            'email.email' => 'O email informado não é válido.',
            'motivo_contatos_id.required' => 'O campo motivo deve ser selecionado.',
            'motivo_contatos_id.exists' => 'O motivo selecionado é inválido.',
            'mensagem.required' => 'O campo mensagem deve ser preenchido.',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres.',
        ];
    }
}

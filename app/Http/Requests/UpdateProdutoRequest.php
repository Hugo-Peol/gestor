<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Ajuste conforme necessário
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
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id',
            'fornecedor_id' => 'required|exists:fornecedores,id'
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
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres.',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres.',
            'peso.required' => 'O campo peso é obrigatório.',
            'peso.integer' => 'O campo peso deve ser um número inteiro.',
            'unidade_id.required' => 'O campo unidade é obrigatório.',
            'unidade_id.exists' => 'A unidade de medida informada não existe.',
            'fornecedor_id.required' => 'O campo fornecedor é obrigatório.',
            'fornecedor_id.exists' => 'O fornecedor informado não existe.'
        ];
    }
}

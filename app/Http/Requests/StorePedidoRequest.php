<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
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
            'cliente_id' => 'required|exists:clientes,id',
            'data_pedido' => 'required|date',
            'status' => 'required|string|max:255'
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
            'cliente_id.required' => 'O campo cliente é obrigatório.',
            'cliente_id.exists' => 'O cliente informado não existe.',
            'data_pedido.required' => 'O campo data do pedido é obrigatório.',
            'data_pedido.date' => 'O campo data do pedido deve ser uma data válida.',
            'status.required' => 'O campo status é obrigatório.',
            'status.string' => 'O campo status deve ser uma string.',
            'status.max' => 'O campo status não pode ter mais que 255 caracteres.'
        ];
    }
}

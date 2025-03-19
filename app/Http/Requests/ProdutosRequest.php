<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'status' => 'required|in:ativo,inativo',
        ];
    }

    /**
     * Define as mensagens personalizadas
     *
     * @return void
     */
    public function messages()
    {
        return [
            'nome.required' => 'Campo nome é obrigatório',
            'descricao.required' => 'Campo descrição é obrigatório',
            'preco.required' => 'Campo preço é obrigatório',
            'preco.numeric' => 'Campo preço deve ser um número',
            'preco.min' => 'Campo preço deve ser maior ou igual a 0',
            'status.required' => 'Campo status é obrigatório',
            'status.in' => 'Campo status deve ser ativo ou inativo',
        ];
    }
}

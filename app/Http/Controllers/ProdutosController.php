<?php

namespace App\Http\Controllers;

use App\DTOs\ProdutoDTO;
use App\Enums\ProdutoStatus;
use App\Http\Requests\ProdutosRequest;
use App\Models\Produtos;
use Illuminate\Http\RedirectResponse;

class ProdutosController extends Controller
{
    
    /**
     * Valida e persiste a informação
     *
     * @param ProdutosRequest $request
     *
     * @return void
     */
    public function create(ProdutosRequest $request) : RedirectResponse
    {

        // Criando o DTO a partir da requisição validada
        $dto = new ProdutoDTO(
            nome: $request->validated()['nome'],
            descricao:  $request->validated()['descricao'],
            preco: $request->validated()['preco'],
            status: ProdutoStatus::from($request->validated()['status'])
        );

        // Persiste a informação
        Produtos::create((array) $dto);

        // Retorna a tela desejada
        return redirect()->route('filament.admin.resources.produtos.index')->with('success', 'Produto Cadastrado!');

    }

    /**
     * Valida e atualiza a informação
     *
     * @param ProdutosRequest $request
     *
     * @return void
     */
    public function update(ProdutosRequest $request, Produtos $produto) : RedirectResponse
    {

        // Criando o DTO a partir da requisição validada
        $dto = new ProdutoDTO(
            nome: $request->validated()['nome'],
            descricao: $request->validated()['descricao'],
            preco: $request->validated()['preco'],
            status: ProdutoStatus::from($request->validated()['status'])
        );

        // Persiste a informação
        Produtos::create((array) $dto);

        // Retorna a tela desejada
        return redirect()->route('filament.admin.resources.produtos.index')->with('success', 'Produto Atualizado!');

    }

}

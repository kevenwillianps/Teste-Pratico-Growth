<?php

namespace Tests\Feature;

use App\Models\Produtos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoTest extends TestCase
{

    // Resete de banco de dados
    //use RefreshDatabase;

    /**
     * Teste de inserção de produto
     *
     * @return void
     */
    public function test_create_produto(): void
    {
     
       // Percorre 10 vezes
       for ($i = 0; $i < 10; $i++) {

            // Cria um novo produto
            $produtos = Produtos::create([

                'nome' => 'Produto Teste',
                'descricao' => 'Descrição do Produto Teste',
                'preco' => 100.00,
                'status' => 'ativo'

            ]);

            // Verifica se o produto foi inserido corretamente no banco de dados
            $this->assertDatabaseHas('produtos', ['nome' => 'Produto Teste']);
            
        }

    }
}

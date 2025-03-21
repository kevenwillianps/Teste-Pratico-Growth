<?php

// Define o namespace da DTO
namespace App\DTOs;

// Importa a enum ProdutoStatus
use App\Enums\ProdutoStatus;

class ProdutoDTO
{
    // O método construtor define os atributos obrigatórios do DTO.
    public function __construct(
        public string $nome,
        public string $descricao,
        public float $preco,
        public ProdutoStatus $status
    ) {}
}

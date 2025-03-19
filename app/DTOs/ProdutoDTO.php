<?php

namespace App\DTOs;

use App\Enums\ProdutoStatus;

class ProdutoDTO
{
    public function __construct(
        public string $nome,
        public string $descricao,
        public float $preco,
        public ProdutoStatus $status
    ) {}
}
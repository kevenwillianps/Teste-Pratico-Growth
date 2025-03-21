<?php

namespace App\Observers;

use App\Models\Produtos;
use Illuminate\Support\Facades\Log;

class ProdutosObserver
{
    /**
     * Cria uma ação quando o produto for criado
     */
    public function created(Produtos $produtos): void
    {
        Log::info('Produto criado: ' . $produtos->toJson());
    }

    /**
     * Cria uma ação quando o produto for atualizado
     */
    public function updated(Produtos $produtos): void
    {
        Log::info('Produto atualizado: ' . $produtos->toJson());
    }

    /**
     * Cria uma ação quando o produto for removido
     */
    public function deleted(Produtos $produtos): void
    {
        Log::info('Produto deletado: ' . $produtos->toJson());
    }

    /**
     * Cria uma ação quando o produto for restaurado
     */
    public function restored(Produtos $produtos): void
    {
        Log::info('Produto restaurado: ' . $produtos->toJson());
    }

    /**
     * Cria uma ação quando o produto for removido
     */
    public function forceDeleted(Produtos $produtos): void
    {
        Log::info('Produto removido: ' . $produtos->toJson());
    }
}

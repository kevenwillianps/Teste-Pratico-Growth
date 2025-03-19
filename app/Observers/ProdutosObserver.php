<?php

namespace App\Observers;

use App\Models\Produtos;
use Illuminate\Support\Facades\Log;

class ProdutosObserver
{
    /**
     * Handle the Produtos "created" event.
     */
    public function created(Produtos $produtos): void
    {
        Log::info('Produto criado: ' . $produtos->toJson());
    }

    /**
     * Handle the Produtos "updated" event.
     */
    public function updated(Produtos $produtos): void
    {
        Log::info('Produto atualizado: ' . $produtos->toJson());
    }

    /**
     * Handle the Produtos "deleted" event.
     */
    public function deleted(Produtos $produtos): void
    {
        Log::info('Produto deletado: ' . $produtos->toJson());
    }

    /**
     * Handle the Produtos "restored" event.
     */
    public function restored(Produtos $produtos): void
    {
        Log::info('Produto restaurado: ' . $produtos->toJson());
    }

    /**
     * Handle the Produtos "force deleted" event.
     */
    public function forceDeleted(Produtos $produtos): void
    {
        Log::info('Produto removido: ' . $produtos->toJson());
    }
}

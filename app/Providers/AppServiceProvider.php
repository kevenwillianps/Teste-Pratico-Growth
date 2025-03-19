<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Produtos;
use App\Observers\ProdutosObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Produtos::observe(ProdutosObserver::class);
    }
}

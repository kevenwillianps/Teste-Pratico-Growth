<?php

// Define o namespace da classe
namespace App\Filament\Pages;

// Importação de classes do Filament
use Filament\Pages\Page;

// Declara a classe ProdutoSearchPage, que herda de Page, tornando-se uma página do painel Filament.
class ProdutoSearchPage extends Page
{
    // Define o ícone que será exibido na navegação do painel administrativo do Filament.
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Define o rótulo da página na navegação do Filament.
    protected static ?string $navigationLabel = 'Pesquisa de Produtos';

    // Define o título da página, que pode ser usado no cabeçalho ou na aba do navegador.
    protected static ?string $title = 'Pesquisa de Produtos';

    // Define o slug da URL para acessar a página. Exemplo: `/admin/pesquisa-produto`
    protected static ?string $slug = 'pesquisa-produto';

    // Define a view Blade que será usada para renderizar a interface da página.
    protected static string $view = 'filament.pages.produto-search-page';
}

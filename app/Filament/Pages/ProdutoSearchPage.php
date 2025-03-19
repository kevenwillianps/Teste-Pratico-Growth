<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ProdutoSearchPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack'; // Ícone da página
    protected static ?string $navigationLabel = 'Pesquisa de Produtos'; // Rótulo no menu
    protected static ?string $title = 'Pesquisa de Produtos'; // Título da página
    protected static ?string $slug = 'pesquisa-produto'; // Slug da URL
    protected static string $view = 'filament.pages.produto-search-page'; // View da página
}
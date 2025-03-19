<?php

namespace App\Filament\Resources\ProdutosResource\Pages;

use App\Filament\Resources\ProdutosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdutos extends ListRecords
{
    protected static string $resource = ProdutosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutosResource\Pages;
use App\Models\Produtos;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Http\Requests\ProdutosRequest;
use App\Enums\ProdutoStatus;
use Filament\Tables\Filters\SelectFilter; 

class ProdutosResource extends Resource
{
    protected static ?string $model = Produtos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Produtos';

    protected static ?string $modelLabel = 'Produto';

    protected static ?string $pluralModelLabel = 'Produtos';

    public static function form(Form $form): Form
    {
        // Definições do formulário
        return $form
            ->columns(1)
            ->schema([
                TextInput::make('nome')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255)
                    ->rules((new ProdutosRequest())->rules()['nome']),
                RichEditor::make('descricao')
                    ->label('Descrição')
                    ->required()
                    ->rules((new ProdutosRequest())->rules()['descricao']),
                TextInput::make('preco')
                    ->label('Preço')
                    ->numeric()
                    ->prefix('R$')
                    ->required()
                    ->rules((new ProdutosRequest())->rules()['preco']),
                Select::make('status')
                    ->label('Status')
                    ->options(ProdutoStatus::class) // Usa o Enum para definir as opções do select
                    ->searchable()
                    ->default(ProdutoStatus::Ativo->value) // Valor padrão
                    ->required()
                    ->rules((new ProdutosRequest())->rules()['status']),
            ]);
    }

    public static function table(Table $table): Table
    {

        // Definições de tabelas
        return $table
            ->columns([
                TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable()
                    ->badge(),
                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('descricao')
                    ->label('Descrição')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('preco')
                    ->money('BRL')
                    ->label('Preço')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([ 
                Tables\Actions\EditAction::make()->modal(),
                Tables\Actions\DeleteAction::make()
                ->requiresConfirmation()
                ->modalHeading('Excluir Produto')
                ->modalDescription('Tem certeza que deseja excluir este produto?')
                ->modalButton('Sim, excluir'),
                Tables\Actions\RestoreAction::make(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Filtrar por Status')
                    ->options(ProdutoStatus::class) // Usa o Enum para definir as opções do filtro
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {

        // Definições de rotas
        return [
            'index' => Pages\ListProdutos::route('/'),
            'create' => Pages\CreateProdutos::route('/create'),
            'edit' => Pages\EditProdutos::route('/{record}/edit'),
        ];
    }

}

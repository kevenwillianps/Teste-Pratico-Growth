<?php

// Define o namespace da classe
namespace App\Filament\Resources;

// Importação de classes
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
    // Especifica qual modelo do banco de dados esta resource está representando.
    protected static ?string $model = Produtos::class;

    // Define o ícone do menu de navegação no painel Filament.
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Define o nome exibido no menu de navegação do painel administrativo.
    protected static ?string $navigationLabel = 'Produtos';

    // Define o rótulo do modelo no singular, utilizado em mensagens e títulos.
    protected static ?string $modelLabel = 'Produto';

    // Define o rótulo do modelo no plural, usado para listar os registros.
    protected static ?string $pluralModelLabel = 'Produtos';

    /**
     * Define o formulário para criar/editar produtos.
     */
    public static function form(Form $form): Form
    {
        return $form
            ->columns(1) // Define o número de colunas do formulário.
            ->schema([ // Define os campos do formulário.

                // Campo de entrada para o nome do produto.
                TextInput::make('nome')
                    ->label('Nome') // Define o rótulo do campo.
                    ->required() // Torna o campo obrigatório.
                    ->maxLength(255) // Define o tamanho máximo do campo.
                    ->rules((new ProdutosRequest())->rules()['nome']), // Valida o campo com base na request.

                // Editor de texto rico para a descrição do produto.
                RichEditor::make('descricao')
                    ->label('Descrição')
                    ->required()
                    ->rules((new ProdutosRequest())->rules()['descricao']), // Valida o campo com base na request.

                // Campo de entrada para o preço do produto.
                TextInput::make('preco')
                    ->label('Preço')
                    ->numeric() // Define que o campo aceita apenas números.
                    ->prefix('R$') // Adiciona um prefixo "R$" antes do valor.
                    ->required()
                    ->rules((new ProdutosRequest())->rules()['preco']), // Valida o campo com base na request.

                // Campo de seleção para o status do produto.
                Select::make('status')
                    ->label('Status')
                    ->options(ProdutoStatus::class) // Usa o Enum ProdutoStatus para definir as opções disponíveis.
                    ->searchable() // Permite buscar opções dentro do select.
                    ->default(ProdutoStatus::Ativo->value) // Define um valor padrão.
                    ->required()
                    ->rules((new ProdutosRequest())->rules()['status']), // Valida o campo com base na request.
            ]);
    }

    /**
     * Define a estrutura da tabela que lista os produtos.
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([ // Define as colunas da tabela.

                // Coluna para exibir o status do produto.
                TextColumn::make('status')
                    ->label('Status')
                    ->searchable() // Permite a pesquisa por status.
                    ->sortable() // Permite ordenação da coluna.
                    ->badge(), // Exibe o status com um estilo de badge.

                // Coluna para exibir o nome do produto.
                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                // Coluna para exibir a descrição do produto.
                TextColumn::make('descricao')
                    ->label('Descrição')
                    ->searchable()
                    ->sortable(),

                // Coluna para exibir o preço do produto em formato monetário.
                TextColumn::make('preco')
                    ->money('BRL') // Formata como moeda em reais.
                    ->label('Preço')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([ 
                // Filtro para buscar produtos por status.
                SelectFilter::make('status')
                    ->label('Filtrar por Status')
                    ->options(ProdutoStatus::class) // Usa o Enum para definir as opções do filtro.
            ])
            ->actions([ // Define as ações disponíveis na listagem.
                Tables\Actions\EditAction::make()->modal(), // Ação de edição dentro de um modal.

                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation() // Pede confirmação antes de excluir.
                    ->modalHeading('Excluir Produto') // Define o título do modal de confirmação.
                    ->modalDescription('Tem certeza que deseja excluir este produto?') // Mensagem do modal.
                    ->modalButton('Sim, excluir'), // Define o texto do botão de confirmação.

                Tables\Actions\RestoreAction::make(), // Ação para restaurar um produto excluído.
            ])
            ->bulkActions([ // Define ações em massa.
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Permite exclusão em massa.
                ]),
            ]);
    }

    static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * Define as páginas disponíveis para esta resource dentro do painel.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProdutos::route('/'), // Página de listagem de produtos.
            'create' => Pages\CreateProdutos::route('/create'), // Página para criar um novo produto.
            'edit' => Pages\EditProdutos::route('/{record}/edit'), // Página para editar um produto específico.
        ];
    }
}

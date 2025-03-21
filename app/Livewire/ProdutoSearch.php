<?php

// Define o namespace da classe
namespace App\Livewire;

// Importação de classes
use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\Produtos;
use Livewire\WithPagination;

class ProdutoSearch extends Component
{

    // Ativa paginção no componente
    use WithPagination;

    // Define a propriedade search como sincronizavel via url
    #[Url]
    public string $search = '';

    // Metodo utilizado sempre o campo de pesquisa for atualizado
    public function updatingSearch(): void
    {

        // Reseta a pagina quando realizado uma nova busca
        $this->resetPage();
    }

    // Metodo utilizado para renderizar o componente e retornar os produtos filtrados
    public function render()
    {
        return view('livewire.produto-search', [

            // Obtem os produtos filtrados
            'produtos' => Produtos::query()

                // Aplica um filtro de busca se o search estiver preenchido
                ->when($this->search, function ($query) {
                    $query->where('nome', 'like', "%{$this->search}%") // Filtra pelo nome do produto
                        ->orWhere('descricao', 'like', "%{$this->search}%"); // Filtra pela descrição do produto
                })
                // Aplica a paginação de 10 em 10
                ->paginate(10),
        ]);
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produtos;
use Livewire\WithPagination;

class ProdutoSearch extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $produtos = Produtos::where('nome', 'like', "%{$this->search}%")
            ->when($this->status !== '', fn ($query) => $query->where('status', $this->status))
            ->orderBy('nome')
            ->paginate(10);

        return view('livewire.produto-search', compact('produtos'));
    }
}

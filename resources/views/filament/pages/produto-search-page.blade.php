{{-- Pagina do filament que irá receber o component de pesquisa --}}
<x-filament::page>
    <x-filament::card>
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">Pesquisa de Produtos</h2>
            {{-- Componente de pesquisa --}}
            @livewire('produto-search')
        </div>
    </x-filament::card>
</x-filament::page>
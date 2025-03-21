<div>
    
    <div class="flex space-x-4 mb-4">

        <input type="text" class="w-full px-4 py-2 border rounded-lg bg-white text-gray-900 border-gray-300 
               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
               dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:focus:ring-blue-400 dark:focus:border-blue-400" wire:model.live.debounce.500ms="search" placeholder="Pesquisar produto..." />
        
    </div>

    <table class="w-full border-collapse border">

        <thead>

            <tr class="bg-dark-200">

                <th class="border p-2">Nome</th>
                <th class="border p-2">Descrição</th>
                <th class="border p-2">Preço</th>
                <th class="border p-2">Status</th>

            </tr>

        </thead>

        <tbody>

            {{-- Percorre todos os registros localizados --}}
            @foreach($produtos as $produto)

                <tr>

                    <td class="border p-2">{{ $produto->nome }}</td>
                    <td class="border p-2">{{ $produto->descricao }}</td>
                    <td class="border p-2">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td class="border p-2">{{ $produto->status }}</td>

                </tr>

            @endforeach

        </tbody>

    </table>

    <div class="mt-4">

        {{-- Cria a paginação --}}
        {{ $produtos->links() }}

    </div>

</div>
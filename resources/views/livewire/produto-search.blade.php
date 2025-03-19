<div class="bg-gray-900 text-dark p-6 rounded-lg">
    <div class="flex space-x-4 mb-4">
        <input type="text" wire:model.debounce.500ms="search" 
            placeholder="Pesquisar por nome..." 
            class="bg-gray-800 text-dark border border-gray-700 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

        <select wire:model="status" 
            class="bg-gray-800 text-dark border border-gray-700 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option value="">Todos</option>
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>
    </div>

    <table class="w-full border-collapse border border-gray-700">
        <thead>
            <tr class="bg-gray-800">
                <th class="border border-gray-700 p-2">Nome</th>
                <th class="border border-gray-700 p-2">Descrição</th>
                <th class="border border-gray-700 p-2">Preço</th>
                <th class="border border-gray-700 p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr class="bg-gray-800 hover:bg-gray-700">
                    <td class="border border-gray-700 p-2">{{ $produto->nome }}</td>
                    <td class="border border-gray-700 p-2">{{ $produto->descricao }}</td>
                    <td class="border border-gray-700 p-2">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td class="border border-gray-700 p-2">
                        <span class="px-2 py-1 rounded 
                            {{ $produto->status === 'ativo' ? 'bg-green-500 text-black' : 'bg-red-500 text-black' }}">
                            {{ $produto->status }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $produtos->links() }}
    </div>
</div>

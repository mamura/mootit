<div>
    <h2 class="text-2xl font-bold mb-6 text-center">Busca de Produtos</h2>

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <input
            type="text"
            wire:model.live="search"
            placeholder="Digite para buscar..."
            class="w-full md:w-1/2 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        />

        <button
            wire:click="clearFilters"
            class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md"
        >
            Limpar Filtros
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block font-semibold mb-2">Categorias:</label>
            <div class="flex flex-wrap gap-2">
                @foreach ($categories as $category)
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" wire:model.live="selectedCategories" value="{{ $category->id }}" />
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div>
            <label class="block font-semibold mb-2">Marcas:</label>
            <div class="flex flex-wrap gap-2">
                @foreach ($brands as $brand)
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" wire:model.live="selectedBrands" value="{{ $brand->id }}" />
                        {{ $brand->name }}
                    </label>
                @endforeach
            </div>
        </div>
    </div>

    <hr class="my-6" />

    <h3 class="text-xl font-semibold mb-4">Resultados ({{ $products->count() }})</h3>

    <ul class="space-y-3">
        @forelse ($products as $product)
            <li class="bg-gray-50 border border-gray-200 rounded-md p-4 shadow-sm">
                <div class="font-semibold">{{ $product->name }}</div>
                <div class="text-sm text-gray-500">
                    {{ $product->category->name }} / {{ $product->brand->name }}
                </div>
            </li>
        @empty
            <li class="text-gray-500 italic">Nenhum produto encontrado.</li>
        @endforelse
    </ul>
</div>

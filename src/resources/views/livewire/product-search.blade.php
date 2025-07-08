<div>
    <h2>Busca de Produtos</h2>

    <input type="text" wire:model.live="search" placeholder="Buscar produto..." class="border p-2 mb-4 w-full">

    <div class="mb-4">
        <strong>Categorias:</strong><br>
        @foreach ($categories as $category)
            <label class="mr-2">
                <input type="checkbox" wire:model.live="selectedCategories" value="{{ $category->id }}">
                {{ $category->name }}
            </label>
        @endforeach
    </div>

    <div class="mb-4">
        <strong>Marcas:</strong><br>
        @foreach ($brands as $brand)
            <label class="mr-2">
                <input type="checkbox" wire:model.live="selectedBrands" value="{{ $brand->id }}">
                {{ $brand->name }}
            </label>
        @endforeach
    </div>

    <hr class="my-4">

    <h3 class="text-lg font-bold mb-2">Resultados ({{ $products->count() }})</h3>

    <ul>
        @forelse ($products as $product)
            <li>
                <strong>{{ $product->name }}</strong> — {{ $product->category->name }} / {{ $product->brand->name }}
            </li>
        @empty
            <li>Nenhum produto encontrado.</li>
        @endforelse
    </ul>
</div>

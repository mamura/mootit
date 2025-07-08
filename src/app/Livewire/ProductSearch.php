<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;

class ProductSearch extends Component
{
    #[Url(history: true)]
    public string $search = '';

    #[Url(as: 'categories', history: true)]
    public array $selectedCategories = [];

    #[Url(as: 'brands', history: true)]
    public array $selectedBrands = [];

    public function clearFilters()
    {
        $this->search = '';
        $this->selectedCategories = [];
        $this->selectedBrands = [];
    }
    
    public function render()
    {
        $query = Product::query()
            ->with(['category', 'brand']);

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
        }

        if (!empty($this->selectedBrands)) {
            $query->whereIn('brand_id', $this->selectedBrands);
        }

        return view('livewire.product-search', [
            'products' => $query->get(),
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }
}

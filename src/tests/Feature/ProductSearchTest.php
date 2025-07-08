<?php

namespace Tests\Feature;

use App\Livewire\ProductSearch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Livewire\Livewire;
use Tests\TestCase;

class ProductSearchTest extends TestCase
{
    use RefreshDatabase;

    private Collection $categories;
    private Collection $brands;

    protected function setUp(): void
    {
        parent::setUp();

        $this->categories = Category::factory()
            ->count(3)
            ->sequence(
                ['name' => 'Notebooks'],
                ['name' => 'Smartphones'],
                ['name' => 'Desktops'],
            )->create();

        $this->brands = Brand::factory()
            ->count(3)
            ->sequence(
                ['name' => 'Apple'],
                ['name' => 'Samsung'],
                ['name' => 'Dell'],
            )->create();

        Product::factory()->create([
            'name' => 'MacBook Pro',
            'category_id' => $this->categories[0]->id,
            'brand_id' => $this->brands[0]->id,
        ]);

        Product::factory()->create([
            'name' => 'iPhone',
            'category_id' => $this->categories[1]->id,
            'brand_id' => $this->brands[0]->id,
        ]);

        Product::factory()->create([
            'name' => 'Galaxy S24',
            'category_id' => $this->categories[1]->id,
            'brand_id' => $this->brands[1]->id,
        ]);

        Product::factory()->create([
            'name' => 'Inspiron 15',
            'category_id' => $this->categories[2]->id,
            'brand_id' => $this->brands[2]->id,
        ]);
    }

    public function initial_load_lists_all_products()
    {
        Livewire::test(ProductSearch::class)
            ->assertSee('MacBook Pro')
            ->assertSee('iPhone')
            ->assertSee('Galaxy S24')
            ->assertSee('Inspiron 15');
    }

    public function it_filters_by_search_term()
    {
        Livewire::test(ProductSearch::class)
            ->set('search', 'macbook')
            ->assertSee('MacBook Pro')
            ->assertDontSee('iPhone');
    }

    public function it_filters_by_category()
    {
        Livewire::test(ProductSearch::class)
            ->set('selectedCategories', [$this->categories[2]->id])
            ->assertSee('Inspiron 15')
            ->assertDontSee('MacBook Pro');
    }

    public function it_filters_by_brand()
    {
        Livewire::test(ProductSearch::class)
            ->set('selectedBrands', [$this->brands[1]->id])
            ->assertSee('Galaxy S24')
            ->assertDontSee('iPhone');
    }

    public function it_can_clear_filters()
    {
        Livewire::test(ProductSearch::class)
            ->set('search', 'macbook')
            ->set('selectedCategories', [$this->categories[0]->id])
            ->set('selectedBrands', [$this->brands[0]->id])
            ->call('clearFilters')
            ->assertSet('search', '')
            ->assertSet('selectedCategories', [])
            ->assertSet('selectedBrands', []);
    }
}

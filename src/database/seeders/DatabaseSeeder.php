<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        Brand::factory(10)->create();
        Product::factory(100)->create([
            'category_id' => fn () => Category::inRandomOrder()->first()->id,
            'brand_id' => fn () => Brand::inRandomOrder()->first()->id,
        ]);
    }
}

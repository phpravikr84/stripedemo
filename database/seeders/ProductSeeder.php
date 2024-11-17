<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['name' => 'Product 1', 'price' => 29.99, 'description' => 'Description for Product 1']);
        Product::create(['name' => 'Product 2', 'price' => 49.99, 'description' => 'Description for Product 2']);
        Product::create(['name' => 'Product 3', 'price' => 19.99, 'description' => 'Description for Product 3']);
    }
}

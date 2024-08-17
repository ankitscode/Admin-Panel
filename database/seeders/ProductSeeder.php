<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::firstOrCreate(['name' => 'Milk','price' => 100, 'category_id'=>1 ,'is_active' => 1]);
        Product::firstOrCreate(['name' => 'Tomato','price' => 100, 'category_id'=>2, 'is_active' => 1]);
        Product::firstOrCreate(['name' => 'fish','price' => 100, 'category_id'=>3 , 'is_active' => 1]);
        Product::firstOrCreate(['name' => 'Rice', 'price' => 100, 'category_id'=>4, 'is_active' => 1]);
    }
}

<?php

// database/seeders/ProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
            'price' => 100,
            'image' => "/images/-10309909.jpg"
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description for Product 2',
            'price' => 200,
            'image' => "/images/product2.jpg"
        ]);
    }
}

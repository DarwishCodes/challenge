<?php

namespace Database\Seeders;
use App\Models\Product;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 10.99,
            'quantity' => 86,
        ]);

        Product::create([
            'name' => 'Product 2',
            'price' => 15.99,
            'quantity' => 21,
        ]);

        Product::create([
            'name' => 'Product 3',
            'price' => 5.60,
            'quantity' => 78,
        ]);

        Product::create([
            'name' => 'Product 4',
            'price' => 50.00,
            'quantity' => 45,
        ]);
    }
}

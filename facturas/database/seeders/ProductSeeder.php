<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $product1 = Product::create([
            'name' => 'Producto 1',
            'price' => '123.45',
            'impuesto' => '5',
            'stock' => '100'
        ]);
        $product2 = Product::create([
            'name' => 'Producto 2',
            'price' => '46.65',
            'impuesto' => '15',
            'stock' => '100'
        ]);
        $product3 = Product::create([
            'name' => 'Producto 3',
            'price' => '39.73',
            'impuesto' => '12',
            'stock' => '100'
        ]);
        $product4 = Product::create([
            'name' => 'Producto 4',
            'price' => '250',
            'impuesto' => '8',
            'stock' => '100'
        ]);
        $product5 = Product::create([
            'name' => 'Producto 5',
            'price' => '59.35',
            'impuesto' => '10',
            'stock' => '100'
        ]);
    }
}

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
    public function run()
    {
        $products = [
            [
                'name' => 'Scullyon Black 2.0',
                'price' => 25,
                'stock' => 50,
                'description' => 'Basic hoodie with a kangaroo pocket, a drawstring hood. With a soft brushed inside.',
                'category_id' => 1, // 1 = Hoodies
            ],
            [
                'name' => 'Try It Hoodie',
                'price' => 27.5,
                'stock' => 50,
                'description' => 'Exclusive design for the Try It event.',
                'category_id' => 1,
            ],
            [
                'name' => 'Please WaIT T-Shirt',
                'price' => 17.5,
                'stock' => 35,
                'description' => 'Basic T-Shirt with a round neck and short sleeves. Exclusive design for the first drop.',
                'category_id' => 2, // 2 = T-Shirts
            ],
            [
                'name' => 'Flowher Hoodie',
                'price' => 45,
                'stock' => 55,
                'description' => 'A hoodie with a different flow or flower. Who knows?',
                'category_id' => 1,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

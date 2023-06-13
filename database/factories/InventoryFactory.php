<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inventory;
use App\Models\Store;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $storeIds = Store::pluck('id');
        $productIds = Product::pluck('id');

        return [
            'store_id' => $this->faker->randomElement($storeIds),
            'product_id' => $this->faker->randomElement($productIds),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'size' => $this->faker->randomElement(['S', 'M','L','XL']),
        ];    }
}

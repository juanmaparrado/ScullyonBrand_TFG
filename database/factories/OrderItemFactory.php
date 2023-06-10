<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $orderIds = Order::pluck('id');
        $productIds = Product::pluck('id');
        $product = Product::find($this->faker->randomElement($productIds));
        $price = $product->price;
        return [
            'order_id' => $this->faker->randomElement($orderIds),
            'product_id' => $product->id,
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $price,
        ];
    }
}

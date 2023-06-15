<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id');

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'status' => $this->faker->randomElement(['processing', 'shipping', 'completed', 'declined', 'cancelled']),
            'payment_method' => $this->faker->randomElement(['credit_card']),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
        ];
    }
}

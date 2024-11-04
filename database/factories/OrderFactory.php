<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'user_id' => User::all()->random()->id,
            'order_date'=>fake()->date(),
            'total_amount' => fake()->randomNumber(2),
            'status' => fake()->randomElement([
                'Your request is being processed.',
                'Your order is ready',
                'It was received'
            ]),
        ];
    }
}

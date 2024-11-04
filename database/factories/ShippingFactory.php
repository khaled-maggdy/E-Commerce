<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipping>
 */
class ShippingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::all()->random()->id,
            'shipping_date'=>fake()->date(),
            'delivery_date'=>fake()->date(),
            'status'=>fake()->randomElement([
                'The request has been received.',
                'I am on my way to you',
                'Delivered'
            ]),
            'tracking_number'=>fake()->randomNumber(2),
        ];
    }
}

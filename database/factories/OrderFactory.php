<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
          'customer_id' => fake()->biasedNumberBetween($min = 1, $max = 25),
          'product_id' => fake()->biasedNumberBetween($min = 1, $max = 20),
          'order_date' => fake()->date($format = 'Y-m-d', $max = 'now'),
          'unit_amount' => fake()->biasedNumberBetween($min = 1, $max = 1),
          'total_sum' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
          'status' => fake()->word('Processed', 'Shipped', 'Delivered'),
          'comments' => fake()->text($maxNbChars = 100),
          'shipped_date' => fake()->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}

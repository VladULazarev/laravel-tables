<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'quantity' => fake()->biasedNumberBetween($min = 10, $max = 99),
            'unit_price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        ];
    }
}

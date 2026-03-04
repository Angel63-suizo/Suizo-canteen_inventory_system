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
    public function definition(): array
    {
        return [
        'product_name' => fake()->word(),
        'product_code' => fake()->unique()->bothify('PROD-####'), 
        'price' => fake()->randomFloat(2, 50, 500),
        'current_stock' => fake()->numberBetween(10, 200),
        'supplier_code' => 'SP-001',
    ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'supplier_name' => fake()->company(),
            'contact_email' => fake()->safeEmail(),
            'contact_number' => fake()->phoneNumber(),
            'supplier_code' => fake()->unique()->bothify('SUP-###'),
        ];
    }
}

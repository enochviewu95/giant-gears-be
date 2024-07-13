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
            'title' => fake()->sentence(2,true),
            'description' => fake()->paragraph(3, true),
            'price' => fake()->randomFloat(2, 1.00, 50.00),
            'quantity' => fake()->numberBetween(0, 20),
            'image'=>fake()->imageUrl()
        ];
    }
}

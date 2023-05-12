<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NomPro' => fake()->company,
            'FotPro' => fake()->imageUrl(),
            'DesPro' => fake()->sentence($nbWords = 20, $variableNbWords = true),
            'PrePro' => fake()->numberBetween($min = 500, $max = 5000),
            'ValPro' => fake()->numberBetween($min = 0, $max = 5),
        ];
    }
}

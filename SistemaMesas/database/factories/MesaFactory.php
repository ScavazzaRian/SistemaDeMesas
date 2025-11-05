<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mesa>
 */
class MesaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero' => fake()->unique()->numberBetween(1, 100),
            'quantidade' => fake()->randomElement([2, 4, 4, 4, 6, 8]),
            'status' => fake()->randomElement(['livre', 'ocupada', 'reservada']),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Mesa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mesa_id' => fake()->randomElement([1,2,3,4,5,6,7,8,9]),
            'status' => 'aberto',
            'total' => fake()->randomFloat(2, 10, 50),
        ];
    }
}

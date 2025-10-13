<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marmita>
 */
class MarmitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome_cliente' => $this->faker->name(),
            'telefone'     => $this->faker->phoneNumber(),
            'endereco'     => $this->faker->address(),
            'tipo'         => $this->faker->randomElement(['pequena', 'média', 'grande']),
            'preco'        => $this->faker->randomFloat(2, 10, 50),
            'status'       => $this->faker->randomElement(['preparando', 'entregue', 'cancelado']),
        ];
    }
}

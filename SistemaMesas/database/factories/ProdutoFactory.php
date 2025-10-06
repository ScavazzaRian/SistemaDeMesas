<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->randomElement([
            'Coca-Cola Lata',
            'Pizza Calabresa',
            'Lasanha Bolonhesa',
            'Brigadeiro',
            'Água Mineral',
            'Suco Natural',
            'Pizza Doce',
            'Pastel de Carne',
            'Torta de Limão'
            ]),
            'preco_compra' => fake()->randomFloat(2, 1, 50),
            'preco_venda' => fake()->randomFloat(2, 5, 100),
            'quantidade' => fake()->numberBetween(1, 100),
            'categoria' => fake()->randomElement([
                'bebidas', 'pratos', 'self-service', 'doces', 'diversos'
            ]),
        ];
    }
}

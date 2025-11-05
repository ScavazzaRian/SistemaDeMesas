<?php

namespace Database\Factories;

use App\Models\Produto;
use App\Models\Mesa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MesaProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = fake()->dateTimeBetween('2025-09-01', '2025-11-04');
        return [
            'mesa_id' => Mesa::inRandomOrder()->first()?->id ?? Mesa::factory(),
            'produto_id' => Produto::inRandomOrder()->first()?->id ?? Produto::factory(),
            'quantidade' => fake()->numberBetween(1, 10),
            'valor_bruto_unitario' => fake()->randomFloat(2, 5, 100),
            'valor_liquido_unitario' => fake()->randomFloat(2, 4, 90), 
            'desconto_unitario' => fake()->randomFloat(2, 0, 15),     
            'created_at' => $data,
            'updated_at' => $data,
        ];
    }
}

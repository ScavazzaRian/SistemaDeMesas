<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PedidoProduto>
 */
class PedidoProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $produto = Produto::inRandomOrder()->first() ?? Produto::factory()->create();
        $pedido = Pedido::inRandomOrder()->first() ?? Pedido::factory()->create();
        $quantidade = $this->faker->numberBetween(1, 5);
        $precoUnitario = $produto->preco_venda;

        return [
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id,
            'quantidade' => $quantidade,
            'preco_unitario_vendido' => $precoUnitario,
            'subtotal' => $quantidade * $precoUnitario,
        ];
    }
}

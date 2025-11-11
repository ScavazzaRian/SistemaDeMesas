<?php

namespace Database\Seeders;

use App\Models\Marmita;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Descomentar codigo caso queira usar o db:seed para popular a tabela user e produto
        $this->call([
            UserSeeder::class,
            ProdutosSeeder::class,
            MarmitasSeeder::class,
            MesaSeeder::class,
            PedidoSeeder::class,
            PedidoProdutoSeeder::class,
        ]);
    }
}

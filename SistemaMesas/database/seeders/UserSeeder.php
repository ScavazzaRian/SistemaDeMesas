<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Descomentar linha abaixo caso queira criar 10 usuarios no banco de dados.
        // \App\Models\User::factory()->count(10)->create();
    }
}

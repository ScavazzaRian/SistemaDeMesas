<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('marmitas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_cliente', 100);
            $table->string('telefone', 20);
            $table->string('endereco', 200);
            $table->enum('tipo', ['pequena', 'média', 'grande']);
            $table->decimal('preco', 10, 2)->nullable();
            $table->enum('status', ['preparando', 'entregue', 'cancelado'])->default('preparando');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marmitas');
    }
};

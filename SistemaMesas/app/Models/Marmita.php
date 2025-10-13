<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marmita extends Model
{
    use HasFactory;

    //Nome da tabela
    protected $table = 'marmitas';

    protected $fillable = [
        'nome_cliente',
        'telefone',
        'endereco',
        'tipo',
        'preco',
        'status'
    ];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function showProdutos(){
        return view('app.produtos.produtos');
    }
}

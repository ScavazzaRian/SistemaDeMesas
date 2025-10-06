<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ProdutosController extends Controller
{
    public function showProdutos(){
        $produtos = Produto::all();
        return view('app.produtos.produtos', compact('produtos'));
    }

    public function showCadastro(){
        return view('');
    }

    public function destroy($id){
        Produto::destroy($id);
        return redirect()->route('produtos');
    }
}

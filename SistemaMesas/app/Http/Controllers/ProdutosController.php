<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function showProdutos(){
        $produtos = Produto::all();
        return view('app.produtos.produtos', compact('produtos'));
    }

    public function showCadastro(){
        return view('app.produtos.produtos_create');
    }

    public function create(Request $request){
        $validate = $request->validate([
            'nome'         => 'required|string|max:255',
            'categoria'    => 'required|in:bebidas,pratos,self-service,doces,diversos',
            'preco_compra' => 'nullable|numeric|min:0', 
            'preco_venda'  => 'required|numeric|min:0',
            'quantidade'   => 'required|integer|min:0',
        ],[
            'nome.required' => 'Por favor, insira um nome.',
            'categoria.required' => 'Por favor, selecione uma categoria.',
            'preco_venda.required' => 'Por favor, informe o valor de venda.',
            'quantidade.required' => 'Por favor, informe a quantidade de produtos.',
        ]);

        Produto::create($validate); 

        return redirect()->route('produtos');
    }

    public function destroy($id){
        Produto::destroy($id);
        return redirect()->route('produtos');
    }
}

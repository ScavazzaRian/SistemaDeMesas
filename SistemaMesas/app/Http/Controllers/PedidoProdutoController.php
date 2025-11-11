<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PedidoProdutoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mesas = Mesa::all();
        $produtos = Produto::all();
        return view('app.pedidos.create', compact('mesas', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'produtos' => 'required|array|min:1',
            'produtos.*.produto_id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
            'produtos.*.preco_unitario_vendido' => 'required|numeric|min:0.01',
        ], 
        [
            'produtos.required' => 'Adicione pelo menos um produto ao pedido.',
            'produtos.*.produto_id.required' => 'O produto é obrigatório.',
            'produtos.*.quantidade.required' => 'A quantidade é obrigatória.',
            'produtos.*.preco_unitario_vendido.required' => 'O preço unitário é obrigatório.',
        ]);
        
        try {
            DB::beginTransaction();
        
            $total = 0;
            foreach ($validate['produtos'] as $item) {
                $total += $item['quantidade'] * $item['preco_unitario_vendido'];
            }
            
            $pedido = Pedido::create([
                'mesa_id' => $validate['mesa_id'],
                'status' => 'aberto',
                'total' => $total,
            ]);

            foreach ($validate['produtos'] as $item) {
                $pedido->produtosRelacao()->create([
                    'produto_id' => $item['produto_id'],
                    'quantidade' => $item['quantidade'],
                    'preco_unitario_vendido' => $item['preco_unitario_vendido'],
                    'subtotal' => $item['quantidade'] * $item['preco_unitario_vendido'],
                ]);
            }
            
            DB::commit();
            
            return redirect()->route('pedidos')->with('success', 'Pedido criado com sucesso!');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => 'Erro ao criar Pedido: ' . $e->getMessage()]);
        }
    }
}

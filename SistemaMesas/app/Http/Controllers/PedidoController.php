<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function showPedidos(){
        $pedidos = Pedido::with('produtosRelacao')->where('status', 'aberto')->orderBy('id', 'asc')->get();
        return view('app.pedidos.pedido', compact('pedidos'));
    }

    public function destroyPedido($id){
        Pedido::destroy($id);
        return redirect()->route('pedidos');
    }

    public function concluirPedido(Pedido $pedido){
        $pedido->update(['status' => 'concluido']);
        return redirect()->route('pedidos');
    }
}

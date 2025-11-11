<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function showPedidos(){
        return view('app.pedidos.pedido');
    }
}

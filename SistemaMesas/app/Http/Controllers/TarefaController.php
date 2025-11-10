<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class TarefaController extends Controller
{
    public function exportarProdutos(){
        $produtos = Produto::orderBy('id', 'asc')->get();
        $pdf = PDF::loadView('app.relatorio.relproduto', ['produtos' => $produtos]);
        return $pdf->stream('relatorio_de_produtos.pdf');
    }

    public function exportarVendasDoDia(){
        // Usando DB::select com a sintaxe SQL corrigida.
        // Note que a consulta agora busca os itens de pedido e junta com a tabela de produtos.
        $vendas = DB::select("
            SELECT
                pp.pedido_id  as pedido_id,
                pr.nome as produto_nome,
                pp.quantidade as quantidade,
                pp.preco_unitario_vendido as valor_liquido_unitario,
                (pp.quantidade * pp.preco_unitario_vendido) as valor_total_item
            FROM pedido_produtos pp
            join pedidos p on p.id = pp.pedido_id 
            JOIN produtos pr on pp.produto_id  = pr.id
            WHERE DATE(p.created_at) = CURRENT_DATE
        ");

        // Calcula o total de vendas para passar para a view
        $totalVendas = 0;
        foreach ($vendas as $venda) {
            $totalVendas += $venda->valor_total_item;
        }

        // Carrega a view do PDF com os dados das vendas e o total
        $pdf = PDF::loadView('app.relatorio.reldiario', compact('vendas', 'totalVendas'));

        return $pdf->stream('relatorio_de_vendas.pdf');
    }
}

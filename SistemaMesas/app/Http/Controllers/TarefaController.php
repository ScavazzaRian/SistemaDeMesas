<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefaController extends Controller
{
    public function exportarProdutos(){
        $produtos = Produto::orderBy('id', 'asc')->get();
        $pdf = PDF::loadView('app.relatorio.relproduto', ['produtos' => $produtos]);
        return $pdf->stream('relatorio_de_produtos.pdf');
    }

    public function exportarVendasDoDia(){
        $vendas = DB::select("
            SELECT
                p.id  as pedido_id,
                p.mesa_id as mesa_id,
                p.status as status,
                p.total as total,
                p.created_at as data_venda
            FROM 
                pedidos p 
            WHERE 
                DATE(p.created_at) = CURRENT_DATE
                AND p.status = 'concluido' 
            ORDER BY 
                p.id
        ");

        $totalVendas = 0;
        foreach ($vendas as $venda) {
            $totalVendas += $venda->total;
        }

        $pdf = PDF::loadView('app.relatorio.reldiario', compact('vendas', 'totalVendas'));

        return $pdf->stream('relatorio_de_vendas.pdf');
    }

    public function exportarVendasDoMes(){
        $mes = now()->month;
        $ano = now()->year;

        $vendas = DB::select("
            SELECT
                p.id  as pedido_id,
                p.mesa_id as mesa_id,
                p.status as status,
                p.total as total,
                p.created_at as data_venda
            FROM 
                pedidos p 
            WHERE 
                EXTRACT(MONTH FROM CAST(p.created_at AS timestamp)) = ?
                AND EXTRACT(YEAR FROM CAST(p.created_at AS timestamp)) = ?
                AND p.status = 'concluido' 
            ORDER BY 
                p.id
        ", [$mes, $ano]);

        $totalVendas = 0;
        foreach($vendas as $venda){
            $totalVendas += $venda->total;
        }

        $pdf = PDF::loadView('app.relatorio.relmes', compact('vendas', 'totalVendas'));
        return $pdf->stream('relatorio_de_vendas_mes.pdf');
    }

    public function relPorPeriodo(Request $request){
        $validate = $request->validate([
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date',
        ], ['required' => 'O campo :attribute é obrigatório.', 'date' => 'O campo :attribute deve ser uma data válida.']);

        $vendas = DB::select("
            SELECT
                p.id  as pedido_id,
                p.mesa_id as mesa_id,
                p.status as status,
                p.total as total,
                p.created_at as data_venda
            FROM 
                pedidos p 
            WHERE 
                p.created_at between ? AND ?
                AND p.status = 'concluido' 
            ORDER BY 
                p.id
        ", [$validate['data_inicio'], $validate['data_fim']  . ' 23:59:59']);

        $totalVendas = 0;
        foreach($vendas as $venda){
            $totalVendas += $venda->total;
        }

        $pdf = PDF::loadView('app.relatorio.relperiodo', compact('vendas', 'totalVendas', 'validate'));

        return $pdf->stream('relatorio_por_periodo.pdf');
    }
}

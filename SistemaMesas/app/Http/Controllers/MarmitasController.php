<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marmita;

class MarmitasController extends Controller
{
    public function showMarmitas(){
        $marmitas = Marmita::orderBy('id', 'asc')->get();
        return view('app.marmitas.marmitas', compact('marmitas'));
    }

    public function showCadastro(){
        return view('app.marmitas.marmitas_create');
    }

    public function showUpdate(Marmita $marmita){
        return view('app.marmitas.marmitas_update', compact('marmita'));
    }

    public function update(Request $request, Marmita $marmita){
        $validate = $request->validate([
            'nome_cliente' => 'required|string|max:100',
            'telefone'     => 'required|string|max:20',
            'endereco'     => 'required|string|max:200',
            'tipo'         => 'required|in:pequena,média,grande',
            'preco'        => 'nullable|numeric|min:0',
            'status'       => 'required|in:preparando,entregue,cancelado',
        ]);

        $marmita->update($validate);
        return redirect()->route('marmitas');
    }

    public function create(Request $request){
        $validate = $request->validate([
            'nome_cliente' => 'required|string|max:100',
            'telefone'     => 'required|string|max:20',
            'endereco'     => 'required|string|max:200',
            'tipo'         => 'required|in:pequena,média,grande',
            'preco'        => 'nullable|numeric|min:0',
            'status'       => 'required|in:preparando,entregue,cancelado',
        ], [
            'nome_cliente.required' => 'Por favor, insira o nome do cliente.',
            'telefone.required'     => 'Por favor, insira o telefone.',
            'endereco.required'     => 'Por favor, insira o endereço.',
            'tipo.required'         => 'Por favor, selecione o tipo da marmita.',
            'status.required'       => 'Por favor, selecione o status do pedido.',
        ]);

        Marmita::create($validate); 

        return redirect()->route('marmitas');
    }

    public function destroy($id){
        Marmita::destroy($id);
        return redirect()->route('marmitas');
    }
}

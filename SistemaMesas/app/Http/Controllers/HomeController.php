<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showMesas(){
        $mesas = Mesa::orderBy('id', 'asc')->get();
        return view('app.home.home', compact('mesas'));
    }

    public function showCadastroMesas(){
        return view('app.home.cadastro');
    }

    public function showEditMesa(Mesa $mesa){
        return view('app.home.editar', compact('mesa'));
    }

    public function createMesas(Request $request){
        $validate=$request->validate([
            'numero' => 'required|integer|min:1',
            'quantidade' => 'required|integer|min:1'
        ]);

        Mesa::create($validate);
        return redirect()->route('home');
    }

    public function updateMesas(Request $request, Mesa $mesa){
        $validate=$request->validate([
            'numero' => 'integer|min:1',
            'quantidade' => 'required|integer|min:1',
        ]);

        $mesa->update($validate);
        return redirect()->route('home');
    }

    public function destroyMesas($id){
        Mesa::destroy($id);
        return redirect()->route('home');
    }
}

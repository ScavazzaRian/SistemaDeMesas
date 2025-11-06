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

    public function destroyMesas($id){
        Mesa::destroy($id);
        return redirect()->route('home');
    }
}

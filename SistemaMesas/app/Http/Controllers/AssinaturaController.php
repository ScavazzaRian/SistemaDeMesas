<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssinaturaController extends Controller
{
    public function showAssinatura(){
        return view('app.assinatura.assinatura');
    }
}

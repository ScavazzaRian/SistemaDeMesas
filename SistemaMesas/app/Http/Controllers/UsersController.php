<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsersController extends Controller
{
    use HasFactory;
    
    public function showLogin(){
        return view('pagLogin.login');
    }

    public function login(Request $request){
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],[
            'email.required' => 'Por favor, informe se email',
            'email.email' => 'Por favor, informe um email válido',
            'password.required' => 'Por favor, informe a senha'
        ]);

        if (Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->route('pedidos');
        }

        return back()->withErrors([
            'email' => 'Credenciais invalidas',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAssinatura
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->pagamento_ativo) {
            return redirect('/pagar')
                ->with('error', 'Você precisa estar com o pagamento ativo para acessar o sistema.');
        }

        return $next($request);
    }
}

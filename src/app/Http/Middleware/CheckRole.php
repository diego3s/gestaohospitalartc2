<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$cargos  // Aceita múltiplos cargos como parâmetro
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$cargos): Response
    {
        if (!Auth::check() || !in_array(Auth::user()->cargo, $cargos)) {
            return redirect('/welcome'); // Redireciona se o cargo não for permitido
        }

        return $next($request);
    }
}

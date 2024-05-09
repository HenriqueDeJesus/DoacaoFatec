<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//
use Symfony\Component\HttpFoundation\Response;

class AuthenticateFuncionario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('funcionario')->check()) {
            // Se o funcionário está autenticado, verifique o tipo de usuário
            $funcionario = Auth::guard('funcionario')->user();

            if ($funcionario->Tipo === 'Administrador') {
                // Se o funcionário é um administrador, permita o acesso
                return $next($request);
            } else {
                // Se o funcionário não é um administrador, negue o acesso
                abort(403, 'Acesso não autorizado.');
            }
        } else {
            // Se o funcionário não está autenticado, redirecione para a página de login
            return redirect()->route('loginfuncionario');
        }
    }

    /*
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::guard('funcionario')->check() == false){
            return redirect()->route('loginfuncionario');
        }
        return $next($request);
    }*/
}

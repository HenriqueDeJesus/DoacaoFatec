<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VerificarTipoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar se o tipo de usuário é "FUNCIONARIO"
        if (session('tipo_usuario') !== 'FUNCIONARIO') {
            // Redirecionar o usuário para uma página de acesso não autorizado
            return redirect()->route('pagina_acesso_nao_autorizado');
        }

        return $next($request);
    }
}
    

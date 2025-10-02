<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckProfessionalStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pega o usuário autenticado
        $user = Auth::user();

        // 1. Verifica se o usuário está logado e se é um profissional (Nutricionista ou Personal)
        if ($user && in_array($user->role, ['Nutricionista', 'Personal'])) {
            
            // 2. Verifica se a validação do profissional está como 'pendente'
            if ($user->validacao === 'pendente') {
                
                // 3. Se estiver pendente, redireciona para a página de "aguardando validação",
                //    a menos que ele já esteja nela (para evitar loops de redirect).
                if (!$request->routeIs('validacao.pendente')) {
                    return redirect()->route('validacao.pendente');
                }
            }
        }

        // Se não for um profissional ou se já foi validado, permite o acesso à rota solicitada.
        return $next($request);
    }
}
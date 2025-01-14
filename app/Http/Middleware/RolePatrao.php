<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importação necessária
use Symfony\Component\HttpFoundation\Response;
use App\Models\User; // Importação do modelo User

class RolePatrao
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $roles = Auth::user()->getRoleNames(); // Obtém os papéis do usuário
            if ($roles->contains('patrão')) {
                return $next($request);
            }

            // Debug para ver os papéis associados
            dd('Papéis do usuário:', $roles);
        }

        abort(403, 'Acesso negado.');
    }
}

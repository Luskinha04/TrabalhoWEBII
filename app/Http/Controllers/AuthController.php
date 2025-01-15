<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class AuthController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processa o login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:6',
        ]);

        // Verifica se o usuário existe e se a senha digitada é igual à senha armazenada
        $usuario = Usuario::where('email', $request->email)->first();

        // Verifica se o usuário existe e se a senha digitada é igual à senha armazenada
        if ($usuario && $usuario->senha == $request->senha) {
            // Inicia uma sessão manualmente
            session(['usuario_id' => $usuario->id]);

            return redirect()->route('produtos'); 
        }

        return back()->withErrors(['email' => 'As credenciais fornecidas são inválidas.']);
    }

    // Tela de destino após login bem-sucedido
    public function outraTela()
    {
        // Verifica se o usuário está autenticado
        if (!session('usuario_id')) {
            return redirect()->route('login'); 
        }

        return view('produtos');
    }
}

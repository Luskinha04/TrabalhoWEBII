<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Usuario;

class AdminController extends Controller
{
    // Exibir o formulário de login
    public function loginForm()
    {
        return view('admin.login');
    }

    // Realizar o login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        // Verificar o usuário e as credenciais
        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && $request->senha == $usuario->senha ) {
            // Verificar se o usuário é um administrador
            $admin = Admin::where('usuario_id', $usuario->id)->first();

            if ($admin) {
                // Configurar a sessão para o administrador logado
                Session::put('admin_logged_in', true);
                Session::put('admin_id', $admin->id);
                Session::put('admin_name', $usuario->nome);

                return redirect()->route('admin.produtos.index')->with('success', 'Bem-vindo, ' . $usuario->nome . '!');
            } else {
                return back()->with('error', 'Acesso restrito apenas para administradores.');
            }
        }

        return back()->with('error', 'Credenciais inválidas.');
    }

    // Logout
    public function logout()
    {
        Session::forget('admin_logged_in');
        Session::forget('admin_id');
        Session::forget('admin_name');

        return redirect()->route('admin.loginForm')->with('success', 'Logout realizado com sucesso.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    // Exibe o formulário de cadastro
    public function create()
    {
        return view('usuario.create');
    }

    // Armazena os dados do novo usuário
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|email|unique:usuario,email',
            'senha' => 'required|min:6|confirmed',
            'telefone' => 'nullable|max:15',
            'endereco' => 'nullable|max:255',
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => $request->senha,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
        ]);

        return redirect()->route('usuario.create')->with('success', 'Usuário cadastrado com sucesso!');
    }
}

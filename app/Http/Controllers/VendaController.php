<?php

namespace App\Http\Controllers;


use App\Models\Venda;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendaController extends Controller
{
    // Exibe a tela de carrinho
    public function showCarrinho()
    {
        return view('carrinho');
    }

    // Cria a venda no banco de dados
    public function criarVenda(Request $request)
    {
        // Validação do carrinho
        $produtos = json_decode($request->produtos, true);

        if (empty($produtos)) {
            return back()->withErrors(['error' => 'O carrinho está vazio.']);
        }

        // Calcular o total da venda
        $total = 0;
        foreach ($produtos as $produto) {
            $total += $produto['preco'] * $produto['quantidade'];
        }

        $usuarioId = session('usuario_id');
    
        // Se não tiver o 'usuario_id' na sessão, redireciona com erro
        if (!$usuarioId) {
            return redirect()->route('login')->withErrors(['login' => 'Você precisa estar logado para realizar uma venda.']);
        }

        // Criar a venda
        foreach ($produtos as $produto) {
            // Cria a venda para cada produto no carrinho
            Venda::create([
                'usuario_id' => $usuarioId,
                'produto_id' => $produto['id'],
                'quantidade' => $produto['quantidade'],
                'total' => $produto['preco'] * $produto['quantidade'],
            ]);
        }

        // Retornar uma resposta de sucesso
        
        return redirect()->route('venda.sucesso')->with('success', 'Venda realizada com sucesso!');
    }

    // Exibe a tela de sucesso após a venda
    public function vendaSucesso()
    {
        return view('venda_sucesso');
    }
}
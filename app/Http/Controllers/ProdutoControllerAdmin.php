<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Produto;

class ProdutoControllerAdmin extends Controller
{
    public function __construct()
    {
        if (!Session::has('admin_logged_in')) {
            abort(403, 'Acesso não autorizado.');
        }
    }

    public function index()
    {
        $produtos = Produto::all();
        return view('admin.produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('admin.produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'descricao' => 'nullable',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
        ]);

        Produto::create($request->all());

        return redirect()->route('admin.produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('admin.produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'descricao' => 'nullable',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return redirect()->route('admin.produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('admin.produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}

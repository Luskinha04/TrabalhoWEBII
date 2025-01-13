<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Category; // Para listar categorias no formulário

class ProdutoController extends Controller
{
    /**
     * Exibe a lista de produtos.
     */
    public function index()
    {
        $produtos = Produto::all(); // Obtém todos os produtos
        return view('produtos.index', compact('produtos'));
    }    

    /**
     * Mostra o formulário para criar um novo produto.
     */
    public function create()
    {
        $categories = Category::all(); // Busca todas as categorias para preencher o dropdown
        return view('produtos.create', compact('categories'));
    }

    /**
     * Armazena um novo produto no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Produto::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um produto específico.
     */
    public function show($id)
    {
        $produto = Produto::with('category')->findOrFail($id); // Carrega o produto com a categoria
        return view('produtos.show', compact('produto'));
    }

    /**
     * Mostra o formulário para editar um produto existente.
     */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categories = Category::all(); // Busca as categorias para o dropdown
        return view('produtos.edit', compact('produto', 'categories'));
    }

    /**
     * Atualiza um produto no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove um produto do banco de dados.
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}

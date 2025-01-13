<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Certifique-se de ter o model Category

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todas as categorias e retorna para a view
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna a view para criar uma nova categoria
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida os dados enviados
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Cria uma nova categoria
        Category::create($request->all());

        // Redireciona para a lista de categorias com mensagem de sucesso
        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Recupera a categoria pelo ID
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Recupera a categoria pelo ID
        $categoria = Category::findOrFail($id);
    
        // Retorna a view com a categoria
        return view('categories.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Valida os dados enviados
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Atualiza a categoria
        $category = Category::findOrFail($id);
        $category->update($request->all());

        // Redireciona para a lista de categorias com mensagem de sucesso
        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Deleta a categoria
        $category = Category::findOrFail($id);
        $category->delete();

        // Redireciona para a lista de categorias com mensagem de sucesso
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
}

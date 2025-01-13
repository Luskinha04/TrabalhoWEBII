<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Exibe a lista de clientes.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes')); 
    }    

    /**
     * Exibe o formulário para criar um novo cliente.
     */
    public function create()
    {
        return view('clientes.create'); // Retorna a view de cadastro de cliente
    }    

    /**
     * Armazena um novo cliente no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
        ]);

        Cliente::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um cliente específico.
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Exibe o formulário para editar um cliente.
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }    

    /**
     * Atualiza um cliente existente no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $id,
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove um cliente do banco de dados.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }
}

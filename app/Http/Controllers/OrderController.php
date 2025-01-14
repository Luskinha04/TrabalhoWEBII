<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('cliente', 'itens.produto')->get();
        return view('order.index', compact('orders'));
    }
    public function edit($id)
    {
        $order = Order::with('itens.produto', 'cliente')->findOrFail($id);
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('order.edit', compact('order', 'clientes', 'produtos'));
    }
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Cria o pedido principal
        $order = Order::create([
            'cliente_id' => $validated['cliente_id'],
            'total' => 0, // Total será atualizado abaixo
        ]);

        // Busca o produto
        $produto = Produto::find($validated['produto_id']);
        if (!$produto || !isset($produto->price)) {
            return redirect()->back()->with('error', 'O produto selecionado não tem preço definido!');
        }

        // Adiciona o produto ao pedido
        $order->itens()->create([
            'produto_id' => $produto->id,
            'quantidade' => $validated['quantidade'],
            'preco' => $produto->price,
        ]);

        // Atualiza o total do pedido
        $order->update([
            'total' => $produto->price * $validated['quantidade'],
        ]);

        // Redireciona para a página de pedidos com mensagem de sucesso
        return redirect()->route('order.index')->with('success', 'Pedido criado com sucesso!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($id);
        $produto = Produto::findOrFail($request->produto_id);

        // Atualiza os dados do pedido
        $order->update([
            'cliente_id' => $request->cliente_id,
            'total' => $produto->price * $request->quantidade,
        ]);

        // Remove os itens antigos e cria os novos
        $order->itens()->delete();
        $order->itens()->create([
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'preco' => $produto->price,
        ]);

        return redirect()->route('order.index')->with('success', 'Pedido atualizado com sucesso!');
    }
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('order.create', compact('clientes', 'produtos'));
    }
    public function show($id)
    {
        $order = Order::with('cliente', 'itens.produto')->findOrFail($id);
        return view('order.show', compact('order'));
    }
    public function destroy($id)
    {
        // Busca o pedido pelo ID
        $order = Order::findOrFail($id);

        // Deleta o pedido
        $order->delete();

        // Redireciona para a lista de pedidos com uma mensagem de sucesso
        return redirect()->route('order.index')->with('success', 'Pedido excluído com sucesso!');
    }
    public function __construct()
    {
        $this->middleware(['auth', 'role:patrão']);
    }
}

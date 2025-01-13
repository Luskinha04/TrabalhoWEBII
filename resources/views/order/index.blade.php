@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Lista de Pedidos</h2>
        <a href="{{ route('order.create') }}" class="btn btn-primary mb-3">Criar Novo Pedido</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Produtos</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->cliente->name }}</td>
                        <td>
                            @foreach($order->itens as $item)
                                {{ $item->produto->name }} (x{{ $item->quantidade }})<br>
                            @endforeach
                        </td>
                        <td>R$ {{ number_format($order->total, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('order.show', $order->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                            <a href="{{ route('order.edit', $order->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Detalhes do Pedido</h2>

        <p><strong>ID:</strong> {{ $order->id }}</p>
        <p><strong>Cliente:</strong> {{ $order->cliente->name }}</p>
        <p><strong>Produtos:</strong></p>
        <ul>
            @foreach($order->itens as $item)
                <li>{{ $item->produto->name }} (Quantidade: {{ $item->quantidade }})</li>
            @endforeach
        </ul>
        <p><strong>Total:</strong> R$ {{ number_format($order->total, 2, ',', '.') }}</p>

        <a href="{{ route('order.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <h2>Editar Pedido</h2>
    <form action="{{ route('order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" id="cliente_id">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $order->cliente_id == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="produto_id">Produto</label>
            <select name="produto_id" id="produto_id">
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}">
                        {{ $produto->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade', $order->itens->first()->quantidade ?? 1) }}">
        </div>

        <button type="submit">Salvar Alterações</button>
        <a href="{{ route('order.index') }}">Cancelar</a>
    </form>
@endsection

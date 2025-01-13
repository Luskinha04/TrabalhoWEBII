@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Novo Pedido</h1>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                <option value="">Selecione um cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select name="produto_id" id="produto_id" class="form-control" required>
                <option value="">Selecione um produto</option>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Criar Pedido</button>
    </form>
</div>
@endsection

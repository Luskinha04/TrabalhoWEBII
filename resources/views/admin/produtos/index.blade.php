@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Produtos</h1>
    <a href="{{ route('admin.produtos.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>
    <a href="/"><img width="60px" src="https://cdn-icons-png.flaticon.com/512/32/32205.png"></img></a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td>{{ $produto->estoque }}</td>
                <td>
                    <a href="{{ route('admin.produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('admin.produtos.destroy', $produto->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

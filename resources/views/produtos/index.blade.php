@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Lista de Produtos</h2>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary mb-3">Criar Novo Produto</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->name }}</td>
                    <td>R$ {{ number_format($produto->price, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display: inline-block;">
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

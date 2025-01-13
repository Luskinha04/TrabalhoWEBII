@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Categorias</h1>

    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Criar Nova Categoria</a>

    @if($categories->isEmpty())
        <p>Nenhuma categoria encontrada.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categorias.show', $category->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                        <a href="{{ route('categorias.edit', $category->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('categorias.destroy', $category->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

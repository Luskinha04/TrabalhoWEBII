@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Criar Nova Categoria</h2>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome da categoria" required>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">Salvar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection

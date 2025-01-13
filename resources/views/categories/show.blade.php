@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Detalhes da Categoria</h2>
    <p><strong>ID:</strong> {{ $category->id }}</p>
    <p><strong>Nome:</strong> {{ $category->name }}</p>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection

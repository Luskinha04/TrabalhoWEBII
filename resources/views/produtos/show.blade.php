@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Detalhes do Produto</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nome: {{ $produto->name }}</h5>
            <p class="card-text"><strong>Descrição:</strong> {{ $produto->description }}</p>
            <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($produto->price, 2, ',', '.') }}</p>
            <p class="card-text"><strong>Estoque:</strong> {{ $produto->stock }}</p>
            <p class="card-text"><strong>Categoria:</strong> {{ $produto->category->name }}</p>
        </div>
    </div>
    <a href="{{ route('produtos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection

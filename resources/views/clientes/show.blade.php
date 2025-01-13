@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Detalhes do Cliente</h2>
    <div class="mb-3">
        <strong>ID:</strong> {{ $cliente->id }}
    </div>
    <div class="mb-3">
        <strong>Nome:</strong> {{ $cliente->name }}
    </div>
    <div class="mb-3">
        <strong>Email:</strong> {{ $cliente->email }}
    </div>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection

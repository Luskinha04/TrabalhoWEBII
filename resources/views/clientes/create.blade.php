@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </form>
</div>
@endsection

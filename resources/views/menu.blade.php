@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Bem-vindo ao Sistema de Gerenciamento</h1>
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('categorias.index') }}" class="btn btn-primary btn-block">Categorias</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('order.index') }}" class="btn btn-success btn-block">Pedidos (Orders)</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('clientes.index') }}" class="btn btn-info btn-block">Clientes</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('produtos.index') }}" class="btn btn-warning btn-block">Produtos</a>
        </div>
    </div>
</div>
@endsection

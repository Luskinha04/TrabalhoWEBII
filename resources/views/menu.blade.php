@extends('layouts.app')

@section('content')
    <div>
        <!-- Aqui vai o conteúdo do menu -->
        <h1>Menu Principal</h1>
        <ul>
            <li><a href="{{ route('categorias.index') }}">Categorias</a></li>
            <li><a href="{{ route('order.index') }}">Pedidos</a></li>
            <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
            <li><a href="{{ route('produtos.index') }}">Produtos</a></li>
        </ul>
    </div>
@endsection

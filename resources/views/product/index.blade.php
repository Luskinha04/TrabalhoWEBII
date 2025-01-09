@extends('product.layouts.app')
@section('content')

<title>Tabela de Produtos</title>
    <h2>Produtos</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Atualizar</th>
            <th>Visualizar</th>
            <th>Excluir</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td><a href="{{ route('products.edit', $product->id) }}">Editar</a></td>
            <td><a href="{{ route('products.show', $product->id) }}">Mostrar</a></td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
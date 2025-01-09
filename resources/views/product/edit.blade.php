@extends('product.layouts.app')
@section('content')
<h2>Cadastro de Produto</h2>
<form action="{{route('products.update', $product->id)}}" method="post">
    @csrf()
    @method("PUT")

    <label for="name">Nome:</label><br>
    <input type="text" id="name" name="name" required value="{{$product->name}}"><br><br>

    <label for="description">Descrição:</label><br>
    <textarea id="description" name="description" rows="4" required>{{$product->description}}</textarea><br><br>

    <label for="price">Preço:</label><br>
    <input type="number" id="price" name="price" step="0.01" required value="{{$product->price}}"><br><br>

    <label for="stock">Estoque:</label><br>
    <input type="number" id="stock" name="stock" required value="{{$product->stock}}"><br><br>

    <input type="submit" value="Cadastrar Produto">
</form>
@endsection
@extends('product.layouts.app')
@section('content')

<h2>Detalhes do Produto</h2>

<form>
    <label for="name">Nome:</label><br>
    <input type="text" id="name" name="name" value="{{$product->name}}" readonly><br><br>

    <label for="description">Descrição:</label><br>
    <textarea id="description" name="description" rows="4" readonly>{{$product->description}}</textarea><br><br>

    <label for="price">Preço:</label><br>
    <input type="text" id="price" name="price" value="R$ {{number_format($product->price, 2, ',', '.') }}" readonly><br><br>

    <label for="stock">Estoque:</label><br>
    <input type="number" id="stock" name="stock" value="{{$product->stock}}" readonly><br><br>

    <a href="{{ route('products.index') }}" class="btn btn-primary">Voltar</a>
</form>
@endsection
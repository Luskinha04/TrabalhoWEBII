@extends('product.layouts.app')
@section('content')
@if($errors->any())
@foreach($errors->all() as $error)
{{$error}}
@endforeach
@endif
<h2>Cadastro de Produto</h2>
<form action="{{route('products.store')}}" method="post">
    @csrf()
    <label for="name">Nome:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="description">Descrição:</label><br>
    <textarea id="description" name="description" rows="4" required></textarea><br><br>

    <label for="price">Preço:</label><br>
    <input type="number" id="price" name="price" step="0.01" required><br><br>

    <label for="stock">Estoque:</label><br>
    <input type="number" id="stock" name="stock" required><br><br>

    <input type="submit" value="Cadastrar Produto">
</form>
@endsection
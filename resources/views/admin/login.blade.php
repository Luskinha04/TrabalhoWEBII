@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Login Administrativo</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Entrar</button>
    </form>
</div>
@endsection

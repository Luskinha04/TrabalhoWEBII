<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastro de Usuário</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('usuario.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}">
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control @error('senha') is-invalid @enderror" id="senha" name="senha">
                @error('senha')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="senha_confirmation" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="senha_confirmation" name="senha_confirmation">
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}">
            </div>

            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- resources/views/produtos/index.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para o rodapé */
        footer {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Estilo para o menu */
        .navbar {
            background-color: #007bff;
        }

        .navbar-brand {
            color: white !important;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
        }

        .navbar-nav {
            width: 100%;
            justify-content: center;
        }
    </style>
</head>
<body>

    <!-- Menu superior -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Produtos Do Supermercado</a>
        <a href="/carrinho"><img width="60px" src="https://seeklogo.com/images/C/Carrinho_de_Compras-logo-F251151A71-seeklogo.com.png"></img></a>
        <a href="/"><img width="60px" src="https://cdn-icons-png.flaticon.com/512/32/32205.png"></img></a>
    </nav>

    <!-- Conteúdo da página -->
    <div class="container mt-5">
        <h2 class="mb-4">Lista de Produtos</h2>
        <div class="row mb-5">
            @foreach ($produtos as $produto)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produto->nome }}</h5>
                            <p class="card-text">{{ $produto->descricao }}</p>
                            <p class="card-text">Preço: R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                            <p class="card-text">Estoque: {{ $produto->estoque }}</p>
                            <button class="btn btn-primary add-to-cart" data-id="{{ $produto->id }}" data-nome="{{ $produto->nome }}" data-preco="{{ $produto->preco }}">Adicionar ao Carrinho</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Rodapé -->
    <footer>
        <p>&copy; 2025 Supermercado - Todos os direitos reservados</p>
    </footer>

    <script>
        // Função para adicionar produto ao carrinho no localStorage
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const produtoId = this.getAttribute('data-id');
                const produtoNome = this.getAttribute('data-nome');
                const produtoPreco = this.getAttribute('data-preco');

                let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

                // Verifica se o produto já está no carrinho
                const produtoIndex = carrinho.findIndex(item => item.id == produtoId);

                if (produtoIndex !== -1) {
                    // Se já está no carrinho, incrementa a quantidade
                    carrinho[produtoIndex].quantidade += 1;
                } else {
                    // Se não está no carrinho, adiciona como novo item
                    carrinho.push({
                        id: produtoId,
                        nome: produtoNome,
                        preco: produtoPreco,
                        quantidade: 1
                    });
                }

                // Atualiza o carrinho no localStorage
                localStorage.setItem('carrinho', JSON.stringify(carrinho));

                alert('Produto adicionado ao carrinho!');
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

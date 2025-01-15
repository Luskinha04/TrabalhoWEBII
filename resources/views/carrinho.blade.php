<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para o rodapé */
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Estilo para a seta de voltar */
        .back-arrow {
            font-size: 1.5rem;
            text-decoration: none;
            color: #007bff;
            margin-top: 10px;
            display: inline-block;
        }

        .back-arrow:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <!-- Seta para voltar -->
    <a href="javascript:history.back()" class="back-arrow">&larr; Voltar</a>

    <h2 class="mt-3">Carrinho de Compras</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="carrinho">
            <!-- Os produtos do carrinho serão listados aqui -->
        </tbody>
    </table>

    <h4 id="total">Total: R$ 0,00</h4>

    <form action="{{ route('venda.criar') }}" method="POST" id="form-venda">
        @csrf
        <input type="hidden" name="produtos" id="produtos">
        <button type="submit" class="btn btn-success">Criar Venda</button>
    </form>
</div>

<!-- Rodapé -->
<footer>
    <p>&copy; 2025 Supermercado - Todos os direitos reservados</p>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        let total = 0;
        const carrinhoTable = document.getElementById('carrinho');
        const totalElement = document.getElementById('total');
        const produtosInput = document.getElementById('produtos');

        // Exibir os itens no carrinho
        carrinhoTable.innerHTML = '';
        carrinho.forEach(item => {
            total += item.preco * item.quantidade;
            carrinhoTable.innerHTML += `
                <tr>
                    <td>${item.nome}</td>
                    <td>R$ ${item.preco}</td>
                    <td>${item.quantidade}</td>
                    <td>R$ ${(item.preco * item.quantidade).toFixed(2)}</td>
                </tr>
            `;
        });

        // Atualizar o total
        totalElement.innerHTML = 'Total: R$ ' + total.toFixed(2);

        // Passar os dados do carrinho para o formulário
        produtosInput.value = JSON.stringify(carrinho);
    });
</script>

</body>
</html>

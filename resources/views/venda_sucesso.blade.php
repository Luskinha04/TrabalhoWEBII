<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda Concluída</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Venda realizada com sucesso!</h2>
    <p>Obrigado pela sua compra.</p>
    <a href="{{ route('produtos') }}" class="btn btn-primary">Voltar para o Inicio</a>
</div>

<script>
    // Função para limpar o carrinho do localStorage
    function limparCarrinho() {
        localStorage.removeItem('carrinho');
    }

    // Chama a função automaticamente quando a página for carregada
    window.onload = function() {
        limparCarrinho();
    };
</script>

</body>
</html>

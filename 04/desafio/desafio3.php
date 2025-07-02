<!--
PHP + HTML

Crie um formulário que permita cadastrar até 3 produtos (nome e preço)
Use funções para:
- Inserir os produtos no array
- Listar os produtos cadastrados
- Calcular a média dos preços
-->
<?php
// Inicia a sessão para armazenar os dados dos produtos entre os acessos
session_start();

// Verifica se o array de produtos já existe na sessão
// Se não existir, inicializa como um array vazio
if (!isset($_SESSION['produtos'])) {
    $_SESSION['produtos'] = [];
}

// Verifica se o formulário foi enviado via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura o nome enviado pelo formulário, ou uma string vazia se não existir
    $nome = $_POST['nome'] ?? '';
    
    // Captura o preço enviado pelo formulário, ou 0 se não existir
    $preco = $_POST['preco'] ?? 0;

    // Verifica se o nome não está vazio, se o preço é numérico e se ainda há espaço para cadastrar (máximo 3)
    if (!empty($nome) && is_numeric($preco) && count($_SESSION['produtos']) < 3) {
        // Adiciona um novo produto no array da sessão com nome e preço
        $_SESSION['produtos'][] = [
            'nome' => $nome,
            'preco' => (float)$preco
        ];
    }
}
?>

<!-- Início do HTML -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title> <!-- Título da aba -->
</head>
<body>
    <h1>Cadastro de Produtos (até 3)</h1> <!-- Título principal da página -->

    <!-- Verifica se ainda não atingiu o limite de 3 produtos -->
    <?php if (count($_SESSION['produtos']) < 3): ?>
        <!-- Formulário para cadastrar produtos -->
        <form method="post">
            <label>Nome do Produto:
                <!-- Campo para digitar o nome do produto -->
                <input type="text" name="nome" required>
            </label><br><br>

            <label>Preço:
                <!-- Campo para digitar o preço do produto -->
                <input type="number" step="0.01" name="preco" required>
            </label><br><br>

            <!-- Botão para enviar o formulário -->
            <button type="submit">Cadastrar Produto</button>
        </form>
    <?php else: ?>
        <!-- Mensagem exibida quando o limite de 3 produtos for atingido -->
        <p>Você já cadastrou 3 produtos.</p>
    <?php endif; ?>

    <h2>Produtos Cadastrados:</h2> <!-- Subtítulo da lista -->

    <?php
    // Verifica se há produtos cadastrados
    if (!empty($_SESSION['produtos'])) {
        echo "<ul>"; // Inicia uma lista não ordenada

        // Percorre o array de produtos para exibir cada um
        foreach ($_SESSION['produtos'] as $produto) {
            // Mostra o nome e o preço do produto formatado
            echo "<li>" . htmlspecialchars($produto['nome']) . " - R$ " . number_format($produto['preco'], 2, ',', '.') . "</li>";
        }

        echo "</ul>"; // Fecha a lista
    } else {
        // Mensagem caso nenhum produto tenha sido cadastrado ainda
        echo "<p>Nenhum produto cadastrado.</p>";
    }

    // Se há produtos cadastrados, calcula a média dos preços
    if (!empty($_SESSION['produtos'])) {
        $soma = 0; // Inicializa a soma

        // Soma todos os preços
        foreach ($_SESSION['produtos'] as $produto) {
            $soma += $produto['preco'];
        }

        // Calcula a média dividindo pela quantidade de produtos
        $media = $soma / count($_SESSION['produtos']);

        // Exibe a média formatada
        echo "<h3>Média dos preços: R$ " . number_format($media, 2, ',', '.') . "</h3>";
    }
    ?>
</body>
</html>

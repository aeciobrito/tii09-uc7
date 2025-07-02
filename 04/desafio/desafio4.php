<!--
PHP + HTML

Crie um formulário que permita cadastrar até 3 produtos (nome e preço)
Use funções para:
- Inserir os produtos no array
- Listar os produtos cadastrados
- Calcular a média dos preços
-->

<!DOCTYPE html> <!-- Define o tipo do documento HTML -->
<html lang="pt-BR"> <!-- Início do HTML com idioma definido como português brasileiro -->
<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres como UTF-8 -->
    <title>Cadastro de Produtos</title> <!-- Título da aba do navegador -->
</head>
<body>
    <h1>Cadastro de até 3 Produtos</h1> <!-- Título principal da página -->

    <!-- Início do formulário com método POST -->
    <form method="post">
        <!-- Laço que cria 3 conjuntos de campos para produtos -->
        <?php for ($i = 0; $i < 3; $i++): ?>
            <fieldset> <!-- Agrupa visualmente os campos de um mesmo produto -->
                <legend>Produto <?= $i + 1 ?></legend> <!-- Exibe o número do produto -->

                <label>Nome:
                    <!-- Campo de texto para o nome do produto, nome como array -->
                    <input type="text" name="nome[]">
                </label><br><br>

                <label>Preço:
                    <!-- Campo numérico para o preço do produto, com passo de 0.01 -->
                    <input type="number" name="preco[]" step="0.01">
                </label>
            </fieldset>
            <br> <!-- Espaçamento entre os fieldsets -->
        <?php endfor; ?>
        
        <!-- Botão para enviar o formulário -->
        <button type="submit">Cadastrar Produtos</button>
    </form>
</body>
</html>

<?php
// Inicializa o array de produtos como vazio
$produtos = [];

// Verifica se o formulário foi enviado via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os nomes dos produtos enviados pelo formulário (ou array vazio, se não vier nada)
    $nomes = $_POST['nome'] ?? [];
    // Recupera os preços dos produtos enviados pelo formulário (ou array vazio, se não vier nada)
    $precos = $_POST['preco'] ?? [];

    // Percorre os arrays de nomes e preços
    for ($i = 0; $i < count($nomes); $i++) {
        // Remove espaços em branco do nome
        $nome = trim($nomes[$i]);
        // Converte o preço para tipo float (número com casas decimais)
        $preco = (float) $precos[$i];

        // Verifica se o nome não está vazio e se o preço é um número válido
        if (!empty($nome) && is_numeric($preco)) {
            // Adiciona o produto (nome e preço) ao array de produtos
            $produtos[] = [
                'nome' => $nome,
                'preco' => $preco
            ];
        }
    }

    // Exibe o título da lista de produtos
    echo "<h2>Produtos Cadastrados:</h2>";
    echo "<ul>";
    // Percorre o array de produtos e exibe cada um como item de lista
    foreach ($produtos as $produto) {
        // Mostra o nome e o preço formatado (duas casas decimais e vírgula como separador decimal)
        echo "<li>" . htmlspecialchars($produto['nome']) . " - R$ " . number_format($produto['preco'], 2, ',', '.') . "</li>";
    }
    echo "</ul>";

    // Inicializa a variável que armazenará a soma dos preços
    $soma = 0;
    // Soma os preços de todos os produtos cadastrados
    foreach ($produtos as $produto) {
        $soma += $produto['preco'];
    }
    // Calcula a média dos preços
    $media = $soma / count($produtos);
    // Exibe a média dos preços formatada
    echo "<p><strong>Média dos preços:</strong> R$ " . number_format($media, 2, ',', '.') . "</p>";
}
?>

<?php
// Define o usuário do banco de dados
$user = "root";

// Define a senha do banco de dados (neste caso, está vazia)
$password = "";

// Define o nome do banco de dados
$database = "loja_produtos";

// Cria um array vazio para armazenar os produtos
$produtos = [];

try {
    // Cria uma conexão com o banco de dados usando PDO
    $db = new PDO("mysql:host=localhost;dbname=$database", $user, "");

    // Executa uma consulta para obter todos os produtos (antes de uma possível inserção)
    $resultado = $db->query("SELECT * FROM produtos");

    // Verifica se os parâmetros 'nome' e 'preco' foram passados via GET (do formulário)
    if (isset($_GET['nome']) && isset($_GET['preco'])) {
        // Pega os valores enviados pelo formulário
        $nome = $_GET['nome'];
        $preco = $_GET['preco'];

        // Prepara uma consulta para inserir o novo produto
        $stmt = $db->prepare("INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)");

        // Executa a consulta passando os valores recebidos
        $stmt->execute([
            ':nome' => $nome,
            ':preco' => $preco
        ]);
    }

    // Reexecuta a consulta para obter a lista atualizada de produtos (após possível inserção)
    $resultado = $db->query("SELECT * FROM produtos");

    // Armazena todos os produtos em um array associativo
    $produtos = $resultado->fetchAll(PDO::FETCH_ASSOC);

// Captura erros de conexão ou execução
} catch (PDOException $e) {
    // Exibe mensagem de erro e interrompe a execução
    die("Erro: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres da página -->
    <title>Cadastro de Produto</title> <!-- Título da aba do navegador -->
</head>
<body>

    <h1>Cadastro de Produto</h1> <!-- Título principal da página -->

    <!-- Formulário para envio de dados via GET para o próprio arquivo -->
    <form method="get" action="conexao.php">
        <label for="nome">Nome do Produto:</label> <!-- Rótulo do campo nome -->
        <input type="text" id="nome" name="nome" required> <!-- Campo de texto para nome do produto -->

        <label for="preco">Preço:</label> <!-- Rótulo do campo preço -->
        <input type="number" step="0.01" id="preco" name="preco" required> <!-- Campo numérico com duas casas decimais -->

        <button type="submit">Adicionar</button> <!-- Botão para enviar o formulário -->
    </form>

    <h2>Produtos:</h2> <!-- Título da seção de listagem -->

    <ul>
        <!-- Início do loop PHP para exibir cada produto -->
        <?php foreach ($produtos as $produto): ?>
            <li><?= $produto['nome'] ?> - R$ <?= $produto['preco'] ?></li> <!-- Item da lista com nome e preço -->
        <?php endforeach; ?>
        <!-- Fim do loop -->
    </ul>

</body>
</html>

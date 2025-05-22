<?php

require_once 'PizzaDAO.php';
// Inclui o arquivo com a classe responsável pela comunicação com o banco de dados.

require_once 'Pizza.php';
// Inclui o arquivo com a definição da classe Pizza (modelo de dados).

$dao = new PizzaDAO();
// Cria uma instância do DAO para uso nos métodos de CRUD.

$pizza = null; // Pizza para edição
// Inicializa a variável $pizza como null. Ela será usada para armazenar os dados, caso seja uma edição.

// Editar Pizza
if(isset($_GET['id'])) {
    // Verifica se foi enviado um ID via GET, indicando que estamos editando uma pizza existente.
    $pizza = $dao->getById($_GET['id']);
    // Busca a pizza no banco com base no ID e armazena na variável $pizza.
}

// Salvar Edição de Pizza
if(isset($_POST['id'])) {
    // Verifica se foi enviado um ID via POST (edição).
    $sabor = $_POST['sabor'];
    $tamanho = $_POST['tamanho'];
    $preco = (float) $_POST['preco']; // Garante que o preço seja numérico

    $pizza = new Pizza($_POST['id'], $sabor, $tamanho, $preco);
    // Cria uma nova instância de Pizza com os dados recebidos do formulário (edição).

    $dao->update($pizza);
    // Atualiza os dados da pizza no banco de dados.

    header("Location: index.php");
    // Redireciona para a página principal após salvar a edição.
    exit();
// Se não for edição, verifica se está cadastrando uma nova pizza:
} else if(isset($_POST['sabor']) && isset($_POST['tamanho']) && isset($_POST['preco'])) {
    $sabor = $_POST['sabor'];
    $tamanho = $_POST['tamanho'];
    $preco = (float) $_POST['preco']; // Converte para float

    $pizza = new Pizza(null, $sabor, $tamanho, $preco);
    // Cria uma nova pizza (sem ID, pois será gerado automaticamente).

    $dao->create($pizza);
    // Insere a nova pizza no banco de dados.

    header("Location: index.php");
    // Redireciona para a página principal após o cadastro.
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- Define o charset da página como UTF-8 -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Garante que a página será responsiva em dispositivos móveis -->

    <title><?= $pizza ? "Editar Pizza" : "Cadastrar Nova Pizza" ?></title>
    <!-- Define o título da aba do navegador dinamicamente com base no contexto -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2><?= $pizza ? "Editar Pizza" : "Cadastrar Nova Pizza" ?></h2>
    <!-- Título da página (edição ou cadastro) -->

    <form action="Pizza_form.php" method="post">
        <!-- Formulário que envia os dados via POST para a mesma página -->

        <?php if ($pizza): ?>
            <!-- Se a pizza existe (edição), inclui um campo oculto com o ID -->
            <input type="hidden" name="id" value="<?= $pizza->getId() ?>">
        <?php endif; ?>

        <label>Sabor:</label>
        <input type="text" name="sabor" required value="<?= $pizza ? $pizza->getSabor() : '' ?>"><br>
        <!-- Campo de texto para o sabor, preenchido se for edição -->

        <label>Tamanho:</label>
        <input type="text" name="tamanho" required value="<?= $pizza ? $pizza->getTamanho() : '' ?>"><br>
        <!-- Campo de texto para o tamanho -->

        <label>Preço:</label>
        <input type="number" name="preco" required value="<?= $pizza ? $pizza->getPreco() : '' ?>"><br>
        <!-- Campo numérico para o preço -->

        <button type="submit">Salvar</button>
        <!-- Botão para enviar o formulário -->
        
        <button type="submit"><a href="index.php">Cancelar</a></button>
        <!-- Botão para enviar o formulário -->

        </form>
</body>
</html>

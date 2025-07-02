<?php

// Inicia a sessão antes de qualquer saída HTML
session_start();

// Inclui o arquivo da classe ProdutoDAO
// Certifique-se de que o caminho está correto para a sua estrutura de pastas
require_once '../dao/ProdutoDAO.php';

// Instancia o DAO de Produto
$dao = new ProdutoDAO();
// Busca todos os produtos do banco de dados
$produtos = $dao->getAll();

// Verifica se o usuário está logado através da sessão
$isLogged = isset($_SESSION['token']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista De Produtos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Home</h1>

    <nav>
        <a href="index.php">Home</a>
        <?php if ($isLogged): ?>
            <a href="usuario.php">Minha Conta</a>
            <a href="logout.php">Sair</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="cadastro.php">Cadastrar</a>
        <?php endif; ?>
    </nav>

    <p>Bem-vindo ao sistema!</p>

    <!-- se sessão estiver ativa, exibe link para página protegida -->
    <?php if($isLogged): ?>
        <a href="protegida.php">Página Protegida</a>
    <?php endif; ?>

    <!-- se sessão estiver ativa, exibe link para página protegida -->
    <?php if($isLogged): ?>
         <h2>Lista de Produtos</h2>

    <a href="../produtos/criar.php">Cadastrar Novo Produto</a>

    <table border="1" cellpading="4">
        <tr>
            <td>Nome</td>
            <td>Preço</td>
            <td>Ações</td>
        </tr>
        <?php foreach($produtos as $prd): ?>
        <tr>
            <td><?= $prd->getNome() ?></td>
            <td><?= $prd->getPreco() ?></td>
            <td>
                <a href="../produtos/ver.php?id=<?= $prd->getId() ?>">Detalhes</a>
                <a href="../produtos/criar.php?id=<?= $prd->getId() ?>">Editar</a>
                <a href="../produtos/criar.php?id=<?= $prd->getId() ?>">Editar</a>
                <a href="../produtos/excluir.php?id=<?= $prd->getId() ?>">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>

</body>
</html>
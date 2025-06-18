<?php
session_start();
require_once '../dao/ProdutoDAO.php';

$dao = new ProdutoDAO();
$produtos = $dao->getAll();
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

    <header class="header">
        <h1 class="titulo-principal">Home</h1>

        <nav class="navegacao">
            <a href="index.php">Home</a>
            <?php if ($isLogged): ?>
                <a href="usuario.php">Minha Conta</a>
                <a href="logout.php">Sair</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="cadastro.php">Cadastrar</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="conteudo-principal">
        <p>Bem-vindo ao sistema!</p>

        <?php if ($isLogged): ?>
            <div class="secao-protegida">
                <!-- <a href="protegida.php" class="botao">Página Protegida</a> -->

                <section class="lista-produtos">
                    <h2>Lista de Contatos</h2>

                    <!-- <a href="../produtos/criar.php" class="botao botao-cadastrar">Cadastrar Novo Produto</a> -->

                    <table class="tabela-produtos">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($produtos as $prd): ?>
                                <tr>
                                    <td><?= $prd->getNome() ?></td>
                                    <td><?= $prd->getPreco() ?></td>
                                    <td>
                                        <a href="../produtos/ver.php?id=<?= $prd->getId() ?>" class="botao-acao ver">Detalhes</a>
                                        <a href="../produtos/criar.php?id=<?= $prd->getId() ?>" class="botao-acao editar">Editar</a>
                                        <a href="../produtos/excluir.php?id=<?= $prd->getId() ?>" class="botao-acao excluir">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        <?php endif; ?>


    </main>

</body>
</html>

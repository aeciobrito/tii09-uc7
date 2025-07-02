<?php
require_once '../backend/ClienteDAO.php';
$dao = new ClienteDAO();

if(!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit;
}

$cliente = $dao->getById($_GET['id']);

if(!$cliente) {
    echo "Cliente não encontrado.";
    echo "<a href='../index.php'>Voltar</a>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <h2>Detalhes do Cliente</h2>
    <ul>
        <li><strong>ID: </strong><?= $cliente->getId() ?></li>
        <li><strong>Nome: </strong><?= $cliente->getNome() ?></li>
        <li><strong>Cpf: </strong><?= $cliente->getCpf() ?></li>
        <li><strong>Ativo: </strong><?= $cliente->getAtivo() ? 'Sim' : 'Não' ?></li>
        <li><strong>Data de Cadastro: </strong><?= $cliente->getDataDeNascimento() ?></li>
    </ul>

    <a href="../index.php">Voltar</a>
    
</body>

</html>

<!-- Teste: -->
<!-- http://localhost/minoru/tii09-uc7/07_02/frontend/cliente_details.php?id=01 -->
